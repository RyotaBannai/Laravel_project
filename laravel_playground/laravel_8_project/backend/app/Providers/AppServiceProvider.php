<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Session\DatabaseSessionHandler;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // $loader = AliasLoader::getInstance();
        // $loader->alias('Illuminate/Session/DatabaseSessionHandler', 'App/Vendor/laravel/framework/src/Illuminate/Session/DatabaseSessionHandler');

        $this->app->singleton(
            // the original class
            'Illuminate\Session\DatabaseSessionHandler',
            // my custom class
            'App/Vendor/laravel/framework/src/Illuminate/Session/DatabaseSessionHandler'
        );
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
