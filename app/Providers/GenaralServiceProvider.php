<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class GenaralServiceProvider extends ServiceProvider
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
        view()->genaral(
            'admin.user.add',
            'App\Http\ViewGenaral\Genaral'
        );
    }
}
