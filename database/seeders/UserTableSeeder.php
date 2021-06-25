<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nisn' => '1',
            'name' => 'Admin',
            'alamat' => '-',
            'tempat_lahir' => '-',
            'tanggal_lahir' => '2000-05-15',
            'jk' => 'Laki-laki',
            'no_hp' => '081234563456',
            'asal_sekolah' => '-',
            'agama' => 'Islam',
            'jurusan' => 'Rekayasa Perangkat Lunak',
            'tahun_lulus' => '2015',
            'email' => 'admin@admin.com',
            'role' => 'admin',
            'password'	=> Hash::make('admin123'),
        ]);
    }
}
