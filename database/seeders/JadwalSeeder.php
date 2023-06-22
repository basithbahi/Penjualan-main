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
            ['id_jadwal' => '1', 'nik' => '1', 'id_kereta' => '1', 'id_rute' => '1', 'harga' => 10000, 'tanggal' => '2023-06-03', 'waktu' => '14:00:00', 'waktu_tiba' => '16:00:00'],
            ['id_jadwal' => '2', 'nik' => '1', 'id_kereta' => '1', 'id_rute' => '2', 'harga' => 10000, 'tanggal' => '2023-06-03', 'waktu' => '15:10:00', 'waktu_tiba' => '17:00:00'],
        ]);
    }
}