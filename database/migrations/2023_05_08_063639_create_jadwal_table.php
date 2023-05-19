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
        Schema::create('jadwal', function (Blueprint $table) {
            $table->id();
            $table->string('id_jadwal')->nullable();
            $table->string('user_jadwal');
            $table->string('jadwal_kereta');
            $table->string('rute_jadwal');
            $table->timestamps();
        });

        Schema::table('transaksi', function (Blueprint $table) {
            $table->dropColumn('transaksi_jadwal');
            $table->foreignId('id_jadwal')->references('id')->on('jadwal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwal');
    }
};
