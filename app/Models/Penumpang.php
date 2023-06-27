<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penumpang extends Model
{
    use HasFactory;

    protected $table = 'penumpang';

    protected $fillable = ['nik', 'nama', 'id_user', 'jk', 'tgl_lahir'];

    public function gerbong()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
