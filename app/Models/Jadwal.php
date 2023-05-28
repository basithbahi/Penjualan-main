<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    protected $table = 'jadwal';

    protected $fillable = ['id_jadwal', 'nik', 'id_kereta', 'id_rute'];

    public function kereta()
    {
        return $this->belongsTo(Kereta::class, 'id_kereta');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'id');
    }

    public function rute()
    {
        return $this->belongsTo(Rute::class, 'id_rute');
    }
}
