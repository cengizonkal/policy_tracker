<?php

namespace App\Console\Commands;

use App\Mail\FollowupMail;
use App\Models\Followup;
use App\Models\Policy;
use App\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class CreateFollowup extends Command
{

    protected $signature = 'followup:auto_create';

    protected $description = 'Create followups according to policy ending dates';


    public function handle()
    {

        /** @var Policy[] $policies */
        $policies = Policy::where('valid_until', '<=', Carbon::today()->addDays(env('FOLLOWUP_DAY', 3)))
            ->where('valid_until', '>', Carbon::today()->startOfDay())
            ->whereDoesntHave('followups')
            ->get();

        foreach ($policies as $policy) {
            $followup = new Followup();
            $followup->policy_id = $policy->id;
            $followup->description = 'Poliçe süresi bitmek üzere';
            $followup->customer_id = $policy->customer_id;
            $followup->save();
        }

        $policies = Policy::has('followups', function ($query) {
            $query->whereNull('resolved_at');
        })->get();

        if (count($policies)) {
            Mail::to(User::all())->send(new FollowupMail($policies));
        }
    }
}
