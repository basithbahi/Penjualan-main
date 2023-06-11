<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->string('invoice')->nullable();
            $table->foreignId('nik')->references('id')->on('users');
            $table->foreignId('id_jadwal')->references('id')->on('jadwal');
            $table->foreignId('id_gerbong')->references('id')->on('gerbong');
            $table->foreignId('id_kursi')->references('id')->on('kursi');
            $table->foreignId('id_metode_pembayaran')->references('id')->on('metode_pembayaran');
            $table->double('total_bayar')->nullable();
            $table->string('bukti_pembayaran')->nullable(); // Tambahkan nullable() di sini
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
};
