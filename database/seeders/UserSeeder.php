<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'nik' => '2141720178',
                'nama' => 'Miko Yusrizal Fahreza',
                'alamat' => 'Tajinan',
                'ttl' => '2002-01-01',
                'jk' => 'Pria',
                'email' => 'miko@mail.com',
                'password' => Hash::make('123'),
                'level' => 'User',
            ],
            [
                'nik' => '2141720179',
                'nama' => 'Tarista Dwi',
                'alamat' => 'Lawang',
                'ttl' => '2001-01-01',
                'jk' => 'Wanita',
                'email' => 'tarista@mail.com',
                'password' => Hash::make('123'),
                'level' => 'User',
            ],
            [
                'nik' => '2141720180',
                'nama' => 'Muhammad Sabilar Rosyad',
                'alamat' => 'Pasuruan',
                'ttl' => '2001-01-01',
                'jk' => 'Pria',
                'email' => 'sabil@mail.com',
                'password' => Hash::make('123'),
                'level' => 'User',
            ],
            [
                'nik' => '2141720123',
                'nama' => 'Abdul Basith Bahi',
                'alamat' => 'Malang',
                'ttl' => '2002-01-01',
                'jk' => 'Pria',
                'email' => 'basith@mail.com',
                'password' => Hash::make('123'),
                'level' => 'Admin',
            ],
            [
                'nik' => '2141720131',
                'nama' => 'Nabila Amalina Syafa',
                'alamat' => 'Lumajang',
                'ttl' => '2001-01-01',
                'jk' => 'Wanita',
                'email' => 'nabila@mail.com',
                'password' => Hash::make('123'),
                'level' => 'Admin',
            ],
        ];

        foreach ($users as $user) {
            DB::table('users')->insert($user);
        }
    }
}