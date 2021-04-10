<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewAccount;
use App\Actions\Fortify\ResetAccountPassword;
use App\Actions\Fortify\UpdateAccountPassword;
use App\Actions\Fortify\UpdateAccountProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Fortify::createUsersUsing(CreateNewAccount::class);
        Fortify::updateUserProfileInformationUsing(UpdateAccountProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateAccountPassword::class);
        Fortify::resetUserPasswordsUsing(ResetAccountPassword::class);

        RateLimiter::for('login', function (Request $request) {
            return Limit::perMinute(5)->by($request->email . $request->ip());
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });
    }
}
