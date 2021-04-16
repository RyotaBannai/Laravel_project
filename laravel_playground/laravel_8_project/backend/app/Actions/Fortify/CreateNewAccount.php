<?php

namespace App\Actions\Fortify;

use App\Models\Account;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewAccount implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered account.
     *
     * @param  array  $input
     * @return \App\Models\Account
     */
    public function create(array $inputs)
    {
        foreach($inputs as $name => $value){
            if(Str::contains($name, ':')){
                [$ops, $column] = explode(':', $name);
                // dd($ops, $column);
            }
        }

        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:accounts'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        return Account::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
