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
        Schema::create('kursi', function (Blueprint $table) {
            $table->id();
            $table->string('id_kursi')->nullable();
            $table->string('nama_kursi')->nullable();
            $table->foreignId('id_gerbong')->references('id')->on('gerbong');
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
        Schema::dropIfExists('kursi');
    }
};
