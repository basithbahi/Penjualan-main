<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StasiunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stasiun')->insert([
            ['id_stasiun' => 'RB02', 'nama_stasiun' => 'Balapan'],
            ['id_stasiun' => 'RB03', 'nama_stasiun' => 'Kota Lama'],
            ['id_stasiun' => 'RB04', 'nama_stasiun' => 'Pasar Senen'],
        ]);
    }
}
