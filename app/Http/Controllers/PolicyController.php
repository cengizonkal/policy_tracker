<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePolicyDetailsRequest;
use App\Http\Requests\CreatePolicyRequest;
use App\Http\Requests\UpdatePolicyRequest;
use App\Models\Customer;
use App\Models\CustomerType;
use App\Models\Policy;
use App\Models\PolicyCompany;
use App\Models\PolicyType;
use Illuminate\Http\Request;


class PolicyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showForm()
    {
        $policyTypes = PolicyType::all();
        $customerTypes = CustomerType::all();
        return view('policy.create')
            ->with('customerTypes', $customerTypes)
            ->with('policyTypes', $policyTypes);
    }

    public function showExistingForm()
    {
        $policyTypes = PolicyType::all();
        $customers = Customer::all();
        return view('policy.create_existing')
            ->with('customers', $customers)
            ->with('policyTypes', $policyTypes);
    }

    public function createExisting(Request $request)
    {
        try {
            \DB::beginTransaction();


            /** @var Customer $customer */
            $customer = Customer::findOrFail($request->get('customer_id'));

            /** @var Policy $policy */
            $policy = $customer->policies()->create([
                'policy_type_id' => $request->get('policy_type_id')
            ]);
            \DB::commit();
            return redirect('policy/' . $policy->id . '/details')
                ->with('message', 'Poliçe oluşturuldu');
        } catch (\Exception $e) {
            \DB::rollBack();
            throw $e;
        }


    }


    public function create(CreatePolicyRequest $policyRequest)
    {
        try {
            \DB::beginTransaction();

            $customer = new Customer();
            $customer->first_name = $policyRequest->get('first_name');
            $customer->last_name = $policyRequest->get('last_name');
            $customer->email = $policyRequest->get('email');
            $customer->phone = $policyRequest->get('phone');
            $customer->address = $policyRequest->get('address');
            $customer->customer_type_id = $policyRequest->get('customer_type_id');

            $customer->save();

            /** @var Policy $policy */
            $policy = $customer->policies()->create([
                'policy_type_id' => $policyRequest->get('policy_type_id')
            ]);

            \DB::commit();
            return redirect('policy/' . $policy->id . '/details')
                ->with('message', 'Poliçe oluşturuldu');
        } catch (\Exception $e) {
            \DB::rollBack();
            throw $e;
        }


    }

    public function details(Policy $policy)
    {
        $policyCompanies = PolicyCompany::all();
        return view('policy.details')
            ->with('policy', $policy)
            ->with('policyCompanies', $policyCompanies);
    }


    public function saveDetails(Policy $policy, UpdatePolicyDetailsRequest $updatePolicyRequest)
    {
        try {
            \DB::beginTransaction();

            $features = [];
            foreach ($policy->policyType->features as $feature) {
                $features[$feature['name']] = $updatePolicyRequest->get($feature['name']);
            }
            if (!empty($features)) {
                $policy->features = $features;
            }
            $policy->price = $updatePolicyRequest->get('price');
            $policy->discount = $updatePolicyRequest->get('discount');
            $policy->start_at = $updatePolicyRequest->get('start_at');
            $policy->valid_until = $updatePolicyRequest->get('valid_until');
            $policy->policy_company_id = $updatePolicyRequest->get('policy_company_id');
            $policy->description = $updatePolicyRequest->get('description');
            $policy->save();
            if ($policy->customer->customerType->is_accountable) {
                $policy->customer->accountingRecords()->create([
                    'debt' => $updatePolicyRequest->get('price'),
                    'credit' => $updatePolicyRequest->get('discount'),
                    'description' => 'Oluşturulan poliçe yüzünden eklenmiştir'
                ]);
            }

            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollBack();
            throw $e;
        }
        return redirect('policy/list')
            ->with('message', 'Poliçe Güncellendi');

    }

    public function getList()
    {
        $policies = Policy::with(['customer', 'policyType', 'policyCompany'])->get();
        return view('policy.list')
            ->with('policies', $policies);
    }


    public function delete(Policy $policy)
    {
        try {
            \DB::beginTransaction();
            $policy->customer->accountingRecords()->create([
                'credit' => $policy->price,
                'debt' => $policy->discount,
                'description' => 'Silinen Poliçe Yüzünden Eklenmiştir'

            ]);
            $policy->followups()->delete();
            $policy->delete();
            \DB::commit();

        } catch (\Exception $exception) {
            \DB::rollBack();
            throw  $exception;
        }
        return redirect('policy/list')->with('message', 'Poliçe Silindi');
    }

    public function edit(Policy $policy)
    {
        $policyCompanies = PolicyCompany::all();

        return view('policy.edit')
            ->with('policyCompanies', $policyCompanies)
            ->with('policy', $policy);
    }

    public function update(Policy $policy, UpdatePolicyRequest $request)
    {
        try {
            \DB::beginTransaction();

            // update policy accounts
            if ($policy->customer->customerType->is_accountable) {
                $policy->customer->accountingRecords()->create([
                    'credit' => $request->get('price') -  $request->get('discount'),
                    'description' => 'Güncellenen poliçe için düzeltme olarak eklenmiştir.'
                ]);
            }

            $policy->price = $request->get('price');
            $policy->discount = $request->get('discount');
            $policy->start_at = $request->get('start_at');
            $policy->valid_until = $request->get('valid_until');
            $policy->policy_company_id = $request->get('policy_company_id');
            $policy->description = $request->get('description');
            $features = [];
            foreach ($policy->policyType->features as $feature) {
                $features[$feature['name']] = $request->get($feature['name']);
            }
            if (!empty($features)) {
                $policy->features = $features;
            }

            if ($policy->customer->customerType->is_accountable) {
                $policy->customer->accountingRecords()->create([
                    'debt' => $request->get('price') - $request->get('discount'),
                    'description' => 'Güncellenen yeni poliçe için eklenmiştir'
                ]);
            }

            $policy->save();

            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollBack();
            throw  $e;
        }

        return redirect('policy/' . $policy->id . '/edit')->with('message', 'Poliçe Güncellendi');
    }


}
