<?php

namespace App\Http\Controllers\Policy;

use App\Models\Policy;
use App\Http\Controllers\Controller;


class ListController extends Controller
{
    public function index()
    {
        $policies = Policy::with(['customer', 'policyType'])->get();
        //dd($policies);

        return view('policy.list')
            ->with('policies', $policies);
    }
}
