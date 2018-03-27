<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
class ComposerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        \View::composer(
            'layouts.header', 'App\Http\ViewComposers\HeaderComposer'
        );
    }

    public function register()
    {
        //
    }
}
