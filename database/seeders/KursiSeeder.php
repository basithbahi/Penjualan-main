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
            ['id_kursi' => 'NA02', 'nama_kursi' => 'A1', 'id_gerbong' => '1'],
            ['id_kursi' => 'NA03', 'nama_kursi' => 'A2', 'id_gerbong' => '1'],
            ['id_kursi' => 'NA04', 'nama_kursi' => 'A3', 'id_gerbong' => '1'],
            ['id_kursi' => 'NA05', 'nama_kursi' => 'A4', 'id_gerbong' => '1'],
            ['id_kursi' => 'NA06', 'nama_kursi' => 'A5', 'id_gerbong' => '1'],
            ['id_kursi' => 'NA07', 'nama_kursi' => 'B1', 'id_gerbong' => '1'],
            ['id_kursi' => 'NA08', 'nama_kursi' => 'B2', 'id_gerbong' => '1'],
            ['id_kursi' => 'NA09', 'nama_kursi' => 'B3', 'id_gerbong' => '1'],
            ['id_kursi' => 'NA10', 'nama_kursi' => 'B4', 'id_gerbong' => '1'],
            ['id_kursi' => 'NA11', 'nama_kursi' => 'B5', 'id_gerbong' => '1'],
            ['id_kursi' => 'NA12', 'nama_kursi' => 'C1', 'id_gerbong' => '1'],
            ['id_kursi' => 'NA13', 'nama_kursi' => 'C2', 'id_gerbong' => '1'],
            ['id_kursi' => 'NA14', 'nama_kursi' => 'C3', 'id_gerbong' => '1'],
            ['id_kursi' => 'NA15', 'nama_kursi' => 'C4', 'id_gerbong' => '1'],
            ['id_kursi' => 'NA16', 'nama_kursi' => 'C5', 'id_gerbong' => '1'],
            ['id_kursi' => 'NA17', 'nama_kursi' => 'D1', 'id_gerbong' => '1'],
            ['id_kursi' => 'NA18', 'nama_kursi' => 'D2', 'id_gerbong' => '1'],
            ['id_kursi' => 'NA19', 'nama_kursi' => 'D3', 'id_gerbong' => '1'],
            ['id_kursi' => 'NA20', 'nama_kursi' => 'D4', 'id_gerbong' => '1'],
            ['id_kursi' => 'NA21', 'nama_kursi' => 'D5', 'id_gerbong' => '1'],
        ]);
    }
}
