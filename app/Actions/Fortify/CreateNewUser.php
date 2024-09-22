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
            'password' => $this->passwordRules(),
            'usertype' => ['required', 'string'],
            'contact_number' => ['required', 'string', 'max:15'],
            'stadium_address' => ['required', 'string', 'max:255'],
            'available_sports' => ['required', 'array'],
            'available_sports.*' => ['string', 'max:255'],
            'years_of_experience' => ['required', 'integer', 'min:0'],
            'level_of_experience' => ['required', 'string', 'max:255'],
            'coaching_sport' => ['required', 'string', 'max:255'],
            'preferred_sports' => ['required', 'array'],
            'preferred_sports.*' => ['string', 'max:255'],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'usertype' => $input['usertype'],
            'contact_number' => $input['contact_number'],
            'stadium_address' => $input['stadium_address'],
            'available_sports' => $input['available_sports'],
            'years_of_experience' => $input['years_of_experience'],
            'level_of_experience' => $input['level_of_experience'],
            'coaching_sport' => $input['coaching_sport'],
            'preferred_sports' => $input['preferred_sports'],
        ]);
    }
}
