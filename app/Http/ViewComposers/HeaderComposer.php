<?php

namespace App\Http\ViewComposers;

use App\Models\Followup;
use Illuminate\View\View;

class HeaderComposer
{
    public function compose(View $view)
    {
        $followups = Followup::whereNull('resolved_at');
        $view->with('followups', $followups);
    }
}