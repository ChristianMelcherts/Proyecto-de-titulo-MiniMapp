<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        

        Blade::directive('endpoint', function ($expression) {
            //$server = '10.0.2.2';
            //$server = 'f77d6301.ngrok.io';
            
            //$endpoint = "http://{$server}/MiniMapp/public/api";
            $endpoint = "http://minimapp.org/api";
            return $endpoint;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
