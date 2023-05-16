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
            $table->string('id_user')->nullable();
            $table->string('id_jadwal')->nullable();
            $table->string('id_metode_pembayaran')->nullable();
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('transaksi_user');
            $table->foreignId('invoice')->references('id')->on('transaksi');
        });

        Schema::table('jadwal', function (Blueprint $table) {
            $table->dropColumn('transaksi_jadwal');
            $table->foreignId('invoice')->references('id')->on('transaksi');
        });

        Schema::table('metode_pembayaran', function (Blueprint $table) {
            $table->dropColumn('transaksi_metode_pembayaran');
            $table->foreignId('invoice')->references('id')->on('transaksi');
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