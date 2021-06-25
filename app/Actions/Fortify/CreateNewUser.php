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
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'nisn' => ['required', 'string', 'max:12', 'unique:users'],
            'jk' => ['required', 'string', 'max:255'],
            'asal_sekolah' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string', 'max:255'],
            'tempat_lahir' => ['required', 'string', 'max:255'],
            'tanggal_lahir' => ['required', 'date', 'before:13 years ago', 'after:21 years ago'],
            'jurusan' => ['required', 'string', 'max:255'],
            'tahun_lulus' => ['required', 'numeric' ,'after:3 years ago'],
            'agama' => ['required', 'string', 'max:255'],
            'no_hp' => ['required','numeric'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'nisn' => $input['nisn'],
            'jk' => $input['jk'],
            'asal_sekolah' => $input['asal_sekolah'],
            'alamat' => $input['alamat'],
            'tempat_lahir' => $input['tempat_lahir'],
            'tanggal_lahir' => $input['tanggal_lahir'],
            'jurusan' => $input['jurusan'],
            'tahun_lulus' => $input['tahun_lulus'],
            'agama' => $input['agama'],
            'no_hp' => $input['no_hp'],
            'email' => $input['email'],
            'password' => Hash::make($input['nisn']),
        ]);
    }
}
