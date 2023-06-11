<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';

    protected $fillable = ['invoice', 'nik', 'id_jadwal', 'id_gerbong', 'id_kursi', 'id_metode_pembayaran', 'total_bayar', 'bukti_pembayaran'];

    public function user()
    {
        return $this->belongsTo(User::class, 'nik');
    }

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class, 'id_jadwal');
    }

    public function gerbong()
    {
        return $this->belongsTo(Gerbong::class, 'id_gerbong');
    }

    public function kursi()
    {
        return $this->belongsTo(Kursi::class, 'id_kursi');
    }

    public function metode_pembayaran()
    {
        return $this->belongsTo(MetodePembayaran::class, 'id_metode_pembayaran');
    }
}
