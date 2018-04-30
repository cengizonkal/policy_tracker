<?php

namespace App\Http\Controllers;

use App\Mail\FollowupMail;
use App\Models\Policy;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class Test extends Controller
{
    public function index()
    {
        /** @var Policy[] $policies */
        $policies = Policy::where('valid_until', '<=', Carbon::today()->addDays(env('FOLLOWUP_DAY', 3)))
            ->where('valid_until', '>=', Carbon::today()->startOfDay())
            ->whereDoesntHave('followups', function ($query) {
                $query->whereNull('resolved_at');
            })->get();
        //return (new \App\Mail\FollowupMail($policies))->render();
        Mail::to(User::all())->send(new FollowupMail($policies));

    }
}
