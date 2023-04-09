<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stasiun extends Model
{
    use HasFactory;

    protected $table = 'stasiun';

    protected $fillable = ['id_stasiun', 'nama_stasiun'];

    public function rute()
    {
        return $this->hasMany(Rute::class, 'id_stasiun');
    }
}
