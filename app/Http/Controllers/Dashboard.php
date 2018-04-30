<?php

namespace App\Http\Controllers;

use App\Models\AccountingRecord;
use App\Models\Policy;
use App\Models\PolicyCompany;
use Illuminate\Http\Request;

class Dashboard extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $totalDebt = AccountingRecord::all()->sum('debt');
        $totalCredit = AccountingRecord::all()->sum('credit');
        $policies = Policy::active()->accountable()->get();
        $policyCompanies = PolicyCompany::all();
        return view('home')
            ->with('balance', $totalDebt - $totalCredit)
            ->with('policyCompanies', $policyCompanies)
            ->with('policies', $policies);
    }
}
