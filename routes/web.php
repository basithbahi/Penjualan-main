<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KeretaController;
use App\Http\Controllers\GerbongController;
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

    Route::controller(BarangController::class)->prefix('barang')->group(function () {
        Route::get('', 'index')->name('barang');
        Route::get('tambah', 'tambah')->name('barang.tambah');
        Route::post('tambah', 'simpan')->name('barang.tambah.simpan');
        Route::get('edit/{id}', 'edit')->name('barang.edit');
        Route::post('edit/{id}', 'update')->name('barang.tambah.update');
        Route::get('hapus/{id}', 'hapus')->name('barang.hapus');
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

    Route::controller(KategoriController::class)->prefix('kategori')->group(function () {
        Route::get('', 'index')->name('kategori');
        Route::get('tambah', 'tambah')->name('kategori.tambah');
        Route::post('tambah', 'simpan')->name('kategori.tambah.simpan');
        Route::get('edit/{id}', 'edit')->name('kategori.edit');
        Route::post('edit/{id}', 'update')->name('kategori.tambah.update');
        Route::get('hapus/{id}', 'hapus')->name('kategori.hapus');
    });
});
