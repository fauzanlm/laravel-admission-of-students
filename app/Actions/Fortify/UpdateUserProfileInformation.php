<?php

namespace App\Actions\Fortify;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'nisn' => ['required', 'string', 'max:12', Rule::unique('users')->ignore($user->id)],
            'jk' => ['required', 'string', 'max:255'],
            'asal_sekolah' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string', 'max:255'],
            'tempat_lahir' => ['required', 'string', 'max:255'],
            'tanggal_lahir' => ['required', 'date', 'before:13 years ago', 'after:21 years ago'],
            'jurusan' => ['required', 'string', 'max:255'],
            'tahun_lulus' => ['required', 'string', 'max:4', 'after:3 years ago'],
            'agama' => ['required', 'string', 'max:255'],
            'no_hp' => ['required', 'string', 'max:15'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
        ])->validateWithBag('updateProfileInformation');

        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }

        if ($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
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
            ])->save();
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    protected function updateVerifiedUser($user, array $input)
    {
        $user->forceFill([
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
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
