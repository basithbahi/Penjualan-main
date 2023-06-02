<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalTable extends Migration
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
            $table->unsignedBigInteger('nik');
            $table->foreign('nik')->references('id')->on('users');
            $table->unsignedBigInteger('id_kereta');
            $table->foreign('id_kereta')->references('id')->on('kereta');
            $table->unsignedBigInteger('id_rute');
            $table->foreign('id_rute')->references('id')->on('rute');
            $table->double('harga');
            $table->dateTime('waktu');
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
        Schema::dropIfExists('jadwal');
    }
}
