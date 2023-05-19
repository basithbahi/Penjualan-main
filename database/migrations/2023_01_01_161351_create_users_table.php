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
            $table->foreignId('id_users')->references('id')->on('users');
        });

        Schema::table('transaksi', function (Blueprint $table) {
            $table->dropColumn('transaksi_user');
            $table->foreignId('id_user')->references('id')->on('user');
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
