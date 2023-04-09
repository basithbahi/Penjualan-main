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
        Schema::create('stasiun', function (Blueprint $table) {
            $table->id();
            $table->string('id_stasiun');
            $table->string('nama_stasiun');
            $table->timestamps();
        });

        Schema::table('rute', function (Blueprint $table) {
            $table->dropColumn('rute_stasiun');
            $table->foreignId('id_stasiun')->references('id')->on('stasiun');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kategori');
    }
};
