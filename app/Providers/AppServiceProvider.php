<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //service container
        $this->app->bind('First_service_container', function(){
            dd('This is my first service container');
        });

        //another way
        app::bind('Second_service_container', function(){
            dd('This is my second service container');
        });

        //another way
        app()->bind('Third_service_container', function(){
            dd('This is my third service container');
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
