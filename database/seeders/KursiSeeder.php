<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KursiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kursi')->insert([
            ['id_kursi' => 'K01', 'nama_kursi' => 'A1', 'id_gerbong' => '1'],
            ['id_kursi' => 'K01', 'nama_kursi' => 'A2', 'id_gerbong' => '1'],
            ['id_kursi' => 'K02', 'nama_kursi' => 'B1', 'id_gerbong' => '1'],
            ['id_kursi' => 'K02', 'nama_kursi' => 'B2', 'id_gerbong' => '1'],
            ['id_kursi' => 'K01', 'nama_kursi' => 'A1', 'id_gerbong' => '2'],
            ['id_kursi' => 'K01', 'nama_kursi' => 'A2', 'id_gerbong' => '2'],
            ['id_kursi' => 'K02', 'nama_kursi' => 'B1', 'id_gerbong' => '2'],
            ['id_kursi' => 'K02', 'nama_kursi' => 'B2', 'id_gerbong' => '2'],
        ]);
    }
}
