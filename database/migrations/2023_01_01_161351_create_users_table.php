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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nik');
            $table->string('nama');
            $table->string('alamat');
            $table->date('ttl');
            $table->string('jk');
            $table->string('email');
            $table->string('password');
            $table->string('level');
            $table->timestamps();
        });

        Schema::table('jadwal', function (Blueprint $table) {
            $table->dropColumn('user_jadwal');
            $table->foreignId('nik')->references('id')->on('users');
        });
    } 

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
