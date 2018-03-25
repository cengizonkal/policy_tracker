<?php

namespace App\Http\Controllers\Customer;

use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('customer.list')->with('customers', $customers);
    }

    public function policies(Customer $customer)
    {
        $customer->load('policies.policyType');
        return view('customer.policies')->with('customer', $customer);
    }


    public function updateForm(Customer $customer)
    {
        return view('customer.update')
            ->with('customer', $customer);
    }

    public function update(Customer $customer, UpdateCustomerRequest $request)
    {
        $customer->first_name = $request->get('first_name');
        $customer->last_name = $request->get('last_name');
        $customer->phone = $request->get('phone');
        $customer->email = $request->get('email');
        $customer->address = $request->get('address');
        $customer->save();
        return redirect('customer/' . $customer->id . '/update')
            ->with('message', 'Cari Güncellendi');
    }
}
