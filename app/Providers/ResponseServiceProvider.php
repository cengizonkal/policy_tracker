<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;

class ResponseServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Response::macro('ajax', function ($message, $data = null, $statusCode=200) {
            return Response::json(['message' => $message, 'data' => $data], $statusCode);
        });

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

    }
}
