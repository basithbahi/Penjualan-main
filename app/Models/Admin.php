<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'users';

    protected $fillable = ['id', 'nik', 'nama', 'alamat', 'ttl', 'jk', 'nomor_telepon', 'email', 'password', 'foto_profil', 'level'];

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class, 'nik');
    }
}
