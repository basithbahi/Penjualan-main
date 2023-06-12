<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KeretaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kereta')->insert([
            ['id_kereta' => 'KRT01', 'nama_kereta' => 'Jayabaya', 'jenis_kereta' => 'Ekonomi'],
            ['id_kereta' => 'KRT02', 'nama_kereta' => 'Probowangi', 'jenis_kereta' => 'Eksekutif'],
            ['id_kereta' => 'KRT03', 'nama_kereta' => 'Argo Lawu', 'jenis_kereta' => 'Bisnis'],
        ]);
    }
}
