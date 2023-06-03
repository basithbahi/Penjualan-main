<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KeretaController;
use App\Http\Controllers\GerbongController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KursiController;
use App\Http\Controllers\StasiunController;
use App\Http\Controllers\RuteController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\MetodePembayaranController;
use App\Http\Controllers\RiwayatTransaksiController;
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

    Route::get('logout', 'logout')
        ->middleware('auth')
        ->name('logout');
});

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::controller(KursiController::class)
        ->prefix('kursi')
        ->group(function () {
            Route::get('', 'index')->name('kursi');
            Route::get('tambah', 'tambah')->name('kursi.tambah');
            Route::post('tambah', 'simpan')->name('kursi.tambah.simpan');
            Route::get('edit/{id}', 'edit')->name('kursi.edit');
            Route::post('edit/{id}', 'update')->name('kursi.tambah.update');
            Route::get('hapus/{id}', 'hapus')->name('kursi.hapus');
            Route::get('search', 'search')->name('kursi.search');
        });

    Route::controller(GerbongController::class)
        ->prefix('gerbong')
        ->group(function () {
            Route::get('', 'index')->name('gerbong');
            Route::get('tambah', 'tambah')->name('gerbong.tambah');
            Route::post('tambah', 'simpan')->name('gerbong.tambah.simpan');
            Route::get('edit/{id}', 'edit')->name('gerbong.edit');
            Route::post('edit/{id}', 'update')->name('gerbong.tambah.update');
            Route::get('hapus/{id}', 'hapus')->name('gerbong.hapus');
            Route::get('search', 'search')->name('gerbong.search');
        });

    Route::controller(KeretaController::class)
        ->prefix('kereta')
        ->group(function () {
            Route::get('', 'index')->name('kereta');
            Route::get('tambah', 'tambah')->name('kereta.tambah');
            Route::post('tambah', 'simpan')->name('kereta.tambah.simpan');
            Route::get('edit/{id}', 'edit')->name('kereta.edit');
            Route::post('edit/{id}', 'update')->name('kereta.tambah.update');
            Route::get('hapus/{id}', 'hapus')->name('kereta.hapus');
            Route::get('search', 'search')->name('kereta.search');
        });

    Route::controller(StasiunController::class)
        ->prefix('stasiun')
        ->group(function () {
            Route::get('', 'index')->name('stasiun');
            Route::get('tambah', 'tambah')->name('stasiun.tambah');
            Route::post('tambah', 'simpan')->name('stasiun.tambah.simpan');
            Route::get('edit/{id}', 'edit')->name('stasiun.edit');
            Route::post('edit/{id}', 'update')->name('stasiun.tambah.update');
            Route::get('hapus/{id}', 'hapus')->name('stasiun.hapus');
            Route::get('search', 'search')->name('stasiun.search');
        });

    Route::controller(RuteController::class)
        ->prefix('rute')
        ->group(function () {
            Route::get('', 'index')->name('rute');
            Route::get('tambah', 'tambah')->name('rute.tambah');
            Route::post('tambah', 'simpan')->name('rute.tambah.simpan');
            Route::get('edit/{id}', 'edit')->name('rute.edit');
            Route::post('edit/{id}', 'update')->name('rute.tambah.update');
            Route::get('hapus/{id}', 'hapus')->name('rute.hapus');
            Route::get('search', 'search')->name('rute.search');
        });
    Route::controller(MetodePembayaranController::class)
        ->prefix('metode_pembayaran')
        ->group(function () {
            Route::get('', 'index')->name('metode_pembayaran');
            Route::get('tambah', 'tambah')->name('metode_pembayaran.tambah');
            Route::post('tambah', 'simpan')->name('metode_pembayaran.tambah.simpan');
            Route::get('edit/{id}', 'edit')->name('metode_pembayaran.edit');
            Route::post('edit/{id}', 'update')->name('metode_pembayaran.tambah.update');
            Route::get('hapus/{id}', 'hapus')->name('metode_pembayaran.hapus');
            Route::get('search', 'search')->name('metode_pembayaran.search');
        });

    Route::controller(AdminController::class)
        ->prefix('admin')
        ->group(function () {
            Route::get('', 'index')->name('admin');
            Route::get('tambah', 'tambah')->name('admin.tambah');
            Route::post('tambah', 'simpan')->name('admin.tambah.simpan');
            Route::get('edit/{id}', 'edit')->name('admin.edit');
            Route::post('edit/{id}', 'update')->name('admin.tambah.update');
            Route::get('hapus/{id}', 'hapus')->name('admin.hapus');
            Route::get('search', 'search')->name('admin.search');
        });

    Route::controller(UserController::class)
        ->prefix('user')
        ->group(function () {
            Route::get('', 'index')->name('user');
            Route::get('tambah', 'tambah')->name('user.tambah');
            Route::post('tambah', 'simpan')->name('user.tambah.simpan');
            Route::get('edit/{id}', 'edit')->name('user.edit');
            Route::post('edit/{id}', 'update')->name('user.tambah.update');
            Route::get('hapus/{id}', 'hapus')->name('user.hapus');
            Route::get('search', 'search')->name('user.search');
        });

    Route::controller(JadwalController::class)
        ->prefix('jadwal')
        ->group(function () {
            Route::get('', 'index')->name('jadwal');
            Route::get('tambah', 'tambah')->name('jadwal.tambah');
            Route::post('tambah', 'simpan')->name('jadwal.tambah.simpan');
            Route::get('edit/{id}', 'edit')->name('jadwal.edit');
            Route::post('edit/{id}', 'update')->name('jadwal.tambah.update');
            Route::get('hapus/{id}', 'hapus')->name('jadwal.hapus');
            Route::get('search', 'search')->name('jadwal.search');
            Route::get('searchIndex', 'searchIndex')->name('jadwal.searchIndex');
        });

    Route::controller(TransaksiController::class)
        ->prefix('transaksi')
        ->group(function () {
            Route::get('', 'index')->name('transaksi');
            Route::get('tambah', 'tambah')->name('transaksi.tambah');
            Route::post('tambah', 'simpan')->name('transaksi.tambah.simpan');
            Route::get('tambahCustomer', 'tambahCustomer')->name('transaksi.tambahCustomer');
            Route::post('tambahCustomer', 'simpanCustomer')->name('transaksi.tambahCustomer.simpanCustomer');
            Route::get('edit/{id}', 'edit')->name('transaksi.edit');
            Route::post('edit/{id}', 'update')->name('transaksi.tambah.update');
            Route::get('hapus/{id}', 'hapus')->name('transaksi.hapus');
            Route::get('bayar/{id}', 'bayar')->name('transaksi.bayar');
            Route::post('bayar/{id}', 'upload')->name('transaksi.bayar.upload');
            Route::get('search', 'search')->name('transaksi.search');
            Route::get('searchKodeBooking', 'searchKodeBooking')->name('transaksi.searchKodeBooking');
        });

        Route::controller(RiwayatTransaksiController::class)->prefix('riwayat_transaksi')->group(function () {
            Route::get('/riwayat_transaksi', [RiwayatTransaksiController::class, 'index'])->name('riwayat_transaksi');
            Route::get('', 'index')->name('riwayat_transaksi.index');
            Route::get('bayar/{id}', 'bayar')->name('riwayat_transaksi.bayar');
            Route::post('bayar/{id}', 'simpan')->name('riwayat_transaksi.bayar.simpan');
            Route::post('bayar/{id}', 'upload')->name('riwayat_transaksi.bayar.upload');
            Route::get('hapus/{id}', 'hapus')->name('riwayat_transaksi.hapus');
            Route::get('search', 'search')->name('riwayat_transaksi.search');
        });

    Route::middleware('auth')->group(function () {
        Route::get('home', function () {
            return view('home');
        })->name('home');

        Route::get('searchIndex', function () {
            return view('searchIndex');
        })->name('searchIndex');

        Route::get('cekKodeBooking', function () {
            return view('cekKodeBooking');
        })->name('cekKodeBooking');

        Route::get('searchKodeBooking', function () {
            return view('searchKodeBooking');
        })->name('searchKodeBooking');

        Route::get('transaksiCustomer', function () {
            return view('transaksiCustomer');
        })->name('transaksiCustomer');

        Route::get('seat', function () {
            return view('seat');
        })->name('seat');

        Route::get('profile', function () {
            return view('profile');
        })->name('profile');
    });
});