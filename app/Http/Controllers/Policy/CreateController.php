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
            $customer->save();

            /** @var Policy $policy */
            $policy = $customer->policies()->create([
                'policy_type_id' => $policyRequest->get('policy_type_id')
            ]);

            \DB::commit();
            return redirect('policy/' . $policy->id . '/items');
        } catch (\Exception $e) {
            \DB::rollBack();
            throw $e;
        }


    }

    public function items(Policy $policy)
    {
        return view('policy.items')
            ->with('policy', $policy);
    }


    public function saveItems(Policy $policy, CreateItemRequest $createItemRequest)
    {


        $item = new Item();
        $item->policy_id = $policy->id;
        $item->description = $createItemRequest->get('description');
        $item->price = $createItemRequest->get('price');
        $features = [];
        foreach ($policy->policy_type->features as $feature => $feature_type) {
            $features[$feature] = $createItemRequest->get($feature);
        }
        if (!empty($features)) {
            $item->features = $features;
        }
        $item->save();
        return redirect('policy/' . $policy->id . '/items');

    }


}
