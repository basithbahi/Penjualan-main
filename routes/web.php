<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\KeretaController;
use App\Http\Controllers\GerbongController;
use App\Http\Controllers\KursiController;
use App\Http\Controllers\StasiunController;
use App\Http\Controllers\RuteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSimpan')->name('register.simpan');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAksi')->name('login.aksi');

    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::controller(KursiController::class)->prefix('kursi')->group(function () {
        Route::get('', 'index')->name('kursi');
        Route::get('tambah', 'tambah')->name('kursi.tambah');
        Route::post('tambah', 'simpan')->name('kursi.tambah.simpan');
        Route::get('edit/{id}', 'edit')->name('kursi.edit');
        Route::post('edit/{id}', 'update')->name('kursi.tambah.update');
        Route::get('hapus/{id}', 'hapus')->name('kursi.hapus');
    });

    Route::controller(GerbongController::class)->prefix('gerbong')->group(function () {
        Route::get('', 'index')->name('gerbong');
        Route::get('tambah', 'tambah')->name('gerbong.tambah');
        Route::post('tambah', 'simpan')->name('gerbong.tambah.simpan');
        Route::get('edit/{id}', 'edit')->name('gerbong.edit');
        Route::post('edit/{id}', 'update')->name('gerbong.tambah.update');
        Route::get('hapus/{id}', 'hapus')->name('gerbong.hapus');
    });

    Route::controller(KeretaController::class)->prefix('kereta')->group(function () {
        Route::get('', 'index')->name('kereta');
        Route::get('tambah', 'tambah')->name('kereta.tambah');
        Route::post('tambah', 'simpan')->name('kereta.tambah.simpan');
        Route::get('edit/{id}', 'edit')->name('kereta.edit');
        Route::post('edit/{id}', 'update')->name('kereta.tambah.update');
        Route::get('hapus/{id}', 'hapus')->name('kereta.hapus');
    });

    Route::controller(StasiunController::class)->prefix('stasiun')->group(function () {
        Route::get('', 'index')->name('stasiun');
        Route::get('tambah', 'tambah')->name('stasiun.tambah');
        Route::post('tambah', 'simpan')->name('stasiun.tambah.simpan');
        Route::get('edit/{id}', 'edit')->name('stasiun.edit');
        Route::post('edit/{id}', 'update')->name('stasiun.tambah.update');
        Route::get('hapus/{id}', 'hapus')->name('stasiun.hapus');
    });

    Route::controller(RuteController::class)->prefix('rute')->group(function () {
        Route::get('', 'index')->name('rute');
        Route::get('tambah', 'tambah')->name('rute.tambah');
        Route::post('tambah', 'simpan')->name('rute.tambah.simpan');
        Route::get('edit/{id}', 'edit')->name('rute.edit');
        Route::post('edit/{id}', 'update')->name('rute.tambah.update');
        Route::get('hapus/{id}', 'hapus')->name('rute.hapus');
    });
});