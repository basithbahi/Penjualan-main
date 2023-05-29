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
            ['id_kursi' => 'NA02', 'nama_kursi' => 'Premium', 'kursi_gerbong' => 'A1', 'id_gerbong' => '1'],
            ['id_kursi' => 'NA03', 'nama_kursi' => 'Package', 'kursi_gerbong' => 'B4', 'id_gerbong' => '2'],
            ['id_kursi' => 'NA04', 'nama_kursi' => 'Split', 'kursi_gerbong' => 'C2', 'id_gerbong' => '3'],
        ]);
    }
}
