<?php

namespace App\Http\Controllers;

use App\Models\Followup;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FollowupController extends Controller
{
    public function index()
    {
        $followups = Followup::with('policy.customer.customerType','policy.policyType')->whereNull('resolved_at')->get();
        return view('followup.list')->with('followups', $followups);
    }

    public function close(Followup $followup, Request $request)
    {
        $followup->resolved_at=Carbon::now();
        $followup->result=$request->get('result');
        $followup->save();
        return redirect('followup/list');

    }

}
