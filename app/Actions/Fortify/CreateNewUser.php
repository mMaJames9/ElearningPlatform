<?php

namespace App\Actions\Fortify;

use App\Events\UserReferred;
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
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {

        Validator::make($input, [
            'classroom_id' => ['required', 'integer'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'phone_number' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        $user = User::create([
            'classroom_id' => $input['classroom_id'],
            'name' => $input['name'],
            'email' => $input['email'],
            'username' => $input['username'],
            'phone_number' => $input['phone_number'],
            'password' => Hash::make($input['password']),
        ]);

        event(new UserReferred(request()->cookie('ref'), $user));

        $user->assignRole("Member");

        return $user;

    }
}
