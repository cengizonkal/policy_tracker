<?php

namespace App\Console\Commands;

use App\Models\Policy;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CreateFollowup extends Command
{

    protected $signature = 'followup:auto_create';

    protected $description = 'Create followups according to policy ending dates';


    public function handle()
    {
        $policies = Policy::where('valid_until', '>=', Carbon::today()->addDays(3))->get();

        foreach ($policies as $policy) {
//            $policy->
        }
    }
}
