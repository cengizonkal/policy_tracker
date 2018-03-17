<?php

namespace App\Http\Controllers\Customer;

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
        return view('customer.policies')->with('customer',$customer);
    }
}
