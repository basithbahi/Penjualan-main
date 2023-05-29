<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MetodePembayaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('metode_pembayaran')->insert([
            ['id_metode_pembayaran' => 'MP02', 'metode_pembayaran' => 'BRI'],
            ['id_metode_pembayaran' => 'MP03', 'metode_pembayaran' => 'BCA'],
            ['id_metode_pembayaran' => 'MP04', 'metode_pembayaran' => 'Mandiri'],
        ]);
    }
}