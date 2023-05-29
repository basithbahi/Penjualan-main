<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GerbongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gerbong')->insert([
            ['id_gerbong' => 'TS02', 'nama_gerbong' => 'EKO-1', 'id_kereta' => '1'],
            ['id_gerbong' => 'TS03', 'nama_gerbong' => 'EKS-1', 'id_kereta' => '2'],
            ['id_gerbong' => 'TS04', 'nama_gerbong' => 'B-1', 'id_kereta' => '3'],
        ]);
    }
}
