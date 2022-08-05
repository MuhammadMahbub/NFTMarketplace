<?php

namespace App\Actions\Fortify;

use Auth;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\ThemeSetting;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Nette\Utils\Random;

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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        $user =  User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'username' => $input['username'],
            'slug' => Str::slug($input['name']).Str::random(1,9).time(),
        ]);

        ThemeSetting::create([
            'user_id' => $user->id,
            'created_at' => Carbon::now(),
        ]);

        return $user;


    }
}
