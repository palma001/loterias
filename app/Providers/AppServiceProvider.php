<?php

namespace App\Providers;

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
        // \Log::info(env('APP_ENV', 'production'));
        // if (env('APP_ENV', 'production') !== 'local') {
        //     $this->app['request']->server->set('HTTPS', true);
        // }
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
