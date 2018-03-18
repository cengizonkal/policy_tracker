<?php

namespace App\Http\Controllers\Customer;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccountingController extends Controller
{
    public function index(Customer $customer)
    {

        return view('customer.accounting')->with('customer', $customer);
    }

    public function add(Customer $customer, Request $request)
    {
        $customer->accountingRecords()->create([
            'debt' => $request->get('debt'),
            'credit' => $request->get('credit'),
            'description'=>$request->get('description'),
        ]);
        return redirect('customer/' . $customer->id . '/accounting');
    }


}
