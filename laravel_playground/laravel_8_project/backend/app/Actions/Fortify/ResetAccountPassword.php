<?php

namespace App\Actions\Fortify;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\ResetsUserPasswords;

class ResetAccountPassword implements ResetsUserPasswords
{
    use PasswordValidationRules;

    /**
     * Validate and reset the account's forgotten password.
     *
     * @param  mixed  $account
     * @param  array  $input
     * @return void
     */
    public function reset($account, array $input)
    {
        Validator::make($input, [
            'password' => $this->passwordRules(),
        ])->validate();

        $account->forceFill([
            'password' => Hash::make($input['password']),
        ])->save();
    }
}
