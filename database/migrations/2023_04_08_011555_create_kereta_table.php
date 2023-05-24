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
        Schema::create('kereta', function (Blueprint $table) {
            $table->id();
            $table->string('id_kereta');
            $table->string('nama_kereta');
            $table->string('jenis_kereta');
            $table->timestamps();
        });

        Schema::table('gerbong', function (Blueprint $table) {
            $table->dropColumn('gerbong_kereta');
            $table->foreignId('id_kereta')->references('id')->on('kereta');
        });
        Schema::table('jadwal', function (Blueprint $table) {
            $table->dropColumn('jadwal_kereta');
            $table->foreignId('id_kereta')->references('id')->on('kereta');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kereta');
    }
};
