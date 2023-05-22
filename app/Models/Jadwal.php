<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    protected $table = 'jadwal';

    protected $fillable = ['id_jadwal', 'id_user', 'id_kereta', 'id_rute'];

    public function kereta()
    {
        return $this->belongsTo(Kereta::class, 'id_kereta');
    }

    public function user()
    {
        return $this->belongsTo(Users::class, 'id_user');
    }

    public function rute()
    {
        return $this->belongsTo(Rute::class, 'id_rute');
    }
}
