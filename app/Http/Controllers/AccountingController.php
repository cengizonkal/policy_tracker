<?php

namespace App\Http\Controllers;

use App\Models\AccountingRecord;
use App\Models\Customer;
use Illuminate\Http\Request;

class AccountingController extends Controller
{
    public function index()
    {
        $accountingRecords = AccountingRecord::with('customer')->get();
        $customers = Customer::all();
        return view('accounting')
            ->with('customers', $customers)
            ->with('accountingRecords', $accountingRecords);
    }

    public function delete(AccountingRecord $accountingRecord)
    {
        $accountingRecord->delete();
        return redirect('accounting/list')->with('message', 'Kayıt silindi');
    }

    public function create(Request $request)
    {
        $customer = Customer::findOrFail($request->get('customer_id'));
        $customer->accountingRecords()->create([
            'debt' => $request->get('debt', '0.00'),
            'credit' => $request->get('credit', '0.00'),
            'description' => $request->get('description'),
        ]);
        return redirect('accounting/list');
    }
}
