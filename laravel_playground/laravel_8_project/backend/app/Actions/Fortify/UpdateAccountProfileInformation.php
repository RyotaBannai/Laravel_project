<?php

namespace App\Actions\Fortify;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateAccountProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($account, array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('accounts')->ignore($account->id)],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
        ])->validateWithBag('updateProfileInformation');

        if (isset($input['photo'])) {
            $account->updateProfilePhoto($input['photo']);
        }

        if (
            $input['email'] !== $account->email &&
            $account instanceof MustVerifyEmail
        ) {
            $this->updateVerifiedAccount($account, $input);
        } else {
            $account->forceFill([
                'name' => $input['name'],
                'email' => $input['email'],
            ])->save();
        }
    }

    /**
     * Update the given verified account's profile information.
     *
     * @param  mixed  $account
     * @param  array  $input
     * @return void
     */
    protected function updateVerifiedAccount($account, array $input)
    {
        $account->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'email_verified_at' => null,
        ])->save();

        $account->sendEmailVerificationNotification();
    }
}
