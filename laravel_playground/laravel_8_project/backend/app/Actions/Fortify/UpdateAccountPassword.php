<?php

namespace App\Actions\Fortify;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\UpdatesUserPasswords;

class UpdateAccountPassword implements UpdatesUserPasswords
{
    use PasswordValidationRules;

    /**
     * Validate and update the account's password.
     *
     * @param  mixed  $account
     * @param  array  $input
     * @return void
     */
    public function update($account, array $input)
    {
        Validator::make($input, [
            'current_password' => ['required', 'string'],
            'password' => $this->passwordRules(),
        ])->after(function ($validator) use ($account, $input) {
            if (!isset($input['current_password']) || !Hash::check($input['current_password'], $account->password)) {
                $validator->errors()->add('current_password', __('The provided password does not match your current password.'));
            }
        })->validateWithBag('updatePassword');

        $account->forceFill([
            'password' => Hash::make($input['password']),
        ])->save();
    }
}
