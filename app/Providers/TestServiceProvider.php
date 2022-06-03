<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class TestServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $data = [];
        $data['a'] = 10;
        $data['b'] = 20;
        $data['c'] = 30;
        view()->share('testing',$data);
    }
}
