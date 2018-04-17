<?php

namespace App\Http\Controllers\Reports;

use App\Models\Policy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PolicyCompany extends Controller
{
    public function index()
    {

        return view('reports.policy_company.index');
    }

    public function filter(Request $request)
    {
        $companies = \App\Models\PolicyCompany::all();
        return view('reports.policy_company.result')->with('companies', $companies);
    }
}
