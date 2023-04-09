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
        Schema::create('gerbong', function (Blueprint $table) {
            $table->id();
            $table->string('id_gerbong')->nullable();
            $table->string('nama_gerbong')->nullable();
            $table->string('gerbong_kereta')->nullable();
            $table->timestamps();
        });

        Schema::table('kursi', function (Blueprint $table) {
            $table->dropColumn('kursi_gerbong');
            $table->foreignId('id_gerbong')->references('id')->on('gerbong');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gerbong');
    }
};