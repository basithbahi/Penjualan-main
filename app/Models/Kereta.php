<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kereta extends Model
{
    use HasFactory;

    protected $table = 'kereta';

    protected $fillable = ['id_kereta', 'nama_kereta', 'jenis_kereta', 'harga'];

    public function gerbong()
    {
        return $this->hasMany(Gerbong::class, 'id_kereta');
    }
}
