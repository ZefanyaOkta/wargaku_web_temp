<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

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
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
            'nik' => [
                'required',
                'string',
                'max:16',
                Rule::unique(User::class),
            ],
            'phone' => ['required', 'string', 'regex:/^(^08)\d{8,11}$/', 'max:14'],
            'date_of_birth' => ['required', 'date'],
            'jenis_kelamin' => ['required', 'string'],
            'address' => ['required', 'string', 'max:255'],
            'kecamatan' => ['required', 'string', 'max:255'],
            'kelurahan' => ['required', 'string', 'max:255'],
        ])->validate();

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'nik' => $input['nik'],
            'phone' => $input['phone'],
            'date_of_birth' => $input['date_of_birth'],
            'sex' => $input['jenis_kelamin'],
        ]);

        $user->address()->create([
            'address' => $input['address'],
            'kecamatan' => $input['kecamatan'],
            'kelurahan' => $input['kelurahan'],
        ]);
        return $user;
    }
}
