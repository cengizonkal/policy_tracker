<?php

namespace App\Http\Controllers\Policy;

use App\Models\Policy;
use App\Http\Controllers\Controller;


class ListController extends Controller
{
    public function index()
    {
        $policies = Policy::with(['customer', 'policyType'])->get();
        return view('policy.list')->with('policies', $policies);
    }
}
