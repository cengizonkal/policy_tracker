<?php

namespace App\Http\Controllers;

use App\Models\AccountingRecord;
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
        return view('home')->with('balance', $totalDebt - $totalCredit);
    }
}
