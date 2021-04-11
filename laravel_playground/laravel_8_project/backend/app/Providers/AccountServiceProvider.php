<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\AccountService;

// DI してつかいたときは、ServiceProvider に登録する必要があるけど、
// Laravel8 では自動解決してくれる感じ

// おそらく不用なので、Service 作って直接 Livewire から呼び出す.

class AccountServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind("AccountService", AccountService::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
