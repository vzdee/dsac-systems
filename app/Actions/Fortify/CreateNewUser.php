<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'last_name' => ['required', 'string', 'max:255'], //validate apellido
            'phone_number' => ['nullable', 'string', 'max:20'], //validate phone number
            'rfc' => ['nullable', 'string', 'max:13'], //validate RFC
            'curp' => ['nullable', 'string', 'max:18'], //validate CURP
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'last_name' => $input['last_name'],
            'phone_number' => $input['phone_number'],
            'rfc' => $input['rfc'],
            'curp' => $input['curp'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
