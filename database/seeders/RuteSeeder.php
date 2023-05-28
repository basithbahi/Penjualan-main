<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RuteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rute')->insert([
            ['id_rute' => 'PW02', 'id_stasiun' => '1', 'stasiun_tujuan' => 'Purwekerto', 'harga' => 20000],
            ['id_rute' => 'PW03', 'id_stasiun' => '2', 'stasiun_tujuan' => 'Gambir', 'harga' => 25000],
            ['id_rute' => 'PW04', 'id_stasiun' => '3', 'stasiun_tujuan' => 'Yogyakarta', 'harga' => 23000],
        ]);
    }
}
