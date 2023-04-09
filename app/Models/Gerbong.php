<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gerbong extends Model
{
    use HasFactory;

    protected $table = 'gerbong';

    protected $fillable = ['id_gerbong', 'nama_gerbong', 'id_kereta'];

    public function kereta()
    {
        return $this->belongsTo(Kereta::class, 'id_kereta');
    }

    public function kursi()
    {
        return $this->belongsTo(Kursi::class, 'id_kursi');
    }
}
