<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePolicyDetailsRequest;
use App\Http\Requests\CreatePolicyRequest;
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


    public function saveDetails(Policy $policy, UpdatePolicyDetailsRequest $createItemRequest)
    {
        try {
            \DB::beginTransaction();

            $features = [];
            foreach ($policy->policyType->features as $feature) {
                $features[$feature['name']] = $createItemRequest->get($feature['name']);
            }

            if (!empty($features)) {
                $policy->features = $features;
            }
            $policy->price = $createItemRequest->get('price');
            $policy->discount = $createItemRequest->get('discount');
            $policy->start_at = $createItemRequest->get('start_at');
            $policy->valid_until = $createItemRequest->get('valid_until');
            $policy->policy_company_id = $createItemRequest->get('policy_company_id');
            $policy->save();
            if ($policy->customer->customerType->is_accountable) {
                $policy->customer->accountingRecords()->create([
                    'debt' => $createItemRequest->get('price'),
                    'credit' => $createItemRequest->get('discount'),
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


}
