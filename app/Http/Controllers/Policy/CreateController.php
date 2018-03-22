<?php

namespace App\Http\Controllers\Policy;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateItemRequest;
use App\Http\Requests\CreatePolicyRequest;
use App\Models\Customer;
use App\Models\Item;
use App\Models\Policy;
use App\Models\PolicyType;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showForm()
    {
        $policyTypes = PolicyType::all();
        return view('policy.create')
            ->with('policyTypes', $policyTypes);
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

            $customer->save();

            /** @var Policy $policy */
            $policy = $customer->policies()->create([
                'policy_type_id' => $policyRequest->get('policy_type_id')
            ]);

            \DB::commit();
            return redirect('policy/' . $policy->id . '/items')
                ->with('message', 'Poliçe oluşturuldu');
        } catch (\Exception $e) {
            \DB::rollBack();
            throw $e;
        }


    }

    public function items(Policy $policy)
    {
        return view('policy.features')
            ->with('policy', $policy);
    }


    public function saveDetails(Policy $policy, CreateItemRequest $createItemRequest)
    {
        try {
            \DB::beginTransaction();

            $features = [];
            foreach ($policy->policyType->features as $feature => $feature_type) {
                $features[$feature] = $createItemRequest->get($feature);
            }
            if (!empty($features)) {
                $policy->features = $features;
            }
            $policy->save();
            $policy->customer->accountingRecords()->create([
                'debt' => $createItemRequest->get('price')
            ]);
            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollBack();
            throw $e;
        }
        return redirect('policy/list')
            ->with('message', 'Poliçe Güncellendi');

    }


}
