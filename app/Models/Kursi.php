<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kursi extends Model
{
    use HasFactory;

    protected $table = 'kursi';

    protected $fillable = ['id_kursi', 'nama_kursi', 'id_gerbong'];

    public function gerbong()
    {
        return $this->belongsTo(Gerbong::class, 'id_gerbong');
    }
}
