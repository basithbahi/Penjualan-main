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
        ['id_kereta' => 'MS02', 'nama_kereta' => 'Jayabaya', 'jenis_kereta' => 'Ekonomi'],
        ['id_kereta' => 'MS03', 'nama_kereta' => 'Probowangi', 'jenis_kereta' => 'Eksekutif'],
        ['id_kereta' => 'MS04', 'nama_kereta' => 'Argo Lawu', 'jenis_kereta' => 'Bisnis'],
        ]);
    }
}
