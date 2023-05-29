<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jadwal')->insert([
            ['id_jadwal' => 'SM02', 'id_user' => '1', 'id_kereta' => '1', 'id_rute' => '2'],
            ['id_jadwal' => 'SM03', 'id_user' => '2', 'id_kereta' => '3', 'id_rute' => '1'],
            ['id_jadwal' => 'SM04', 'id_user' => '3', 'id_kereta' => '2', 'id_rute' => '3'],
        ]);
    }
}
