<?php

namespace App\Console\Commands;

use App\Models\Followup;
use App\Models\Policy;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CreateFollowup extends Command
{

    protected $signature = 'followup:auto_create';

    protected $description = 'Create followups according to policy ending dates';


    public function handle()
    {

        /** @var Policy[] $policies */
        $policies = Policy::where('valid_until', '<=', Carbon::today()->addDays(env('FOLLOWUP_DAY',3)))
            ->where('valid_until', '>', Carbon::today()->startOfDay())
            ->whereDoesntHave('followups', function ($query) {
                $query->whereNull('resolved_at');
            })->get();

        foreach ($policies as $policy) {
            $followup = new Followup();
            $followup->policy_id = $policy->id;
            $followup->description = 'Poliçe süresi bitmek üzere';
            $followup->customer_id = $policy->customer_id;
            $followup->save();
        }
    }
}
