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
            ['id_jadwal' => 'SM02', 'nik' => '1', 'id_kereta' => '1', 'id_rute' => '2', 'harga' => 200000],
            ['id_jadwal' => 'SM03', 'nik' => '2', 'id_kereta' => '3', 'id_rute' => '1', 'harga' => 300000],
            ['id_jadwal' => 'SM04', 'nik' => '3', 'id_kereta' => '2', 'id_rute' => '3', 'harga' => 150000],
        ]);
    }
}