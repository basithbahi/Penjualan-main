<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rute extends Model
{
    use HasFactory;

    protected $table = 'rute';

    protected $fillable = ['id_rute', 'id_stasiun'];

    public function stasiun()
    {
        return $this->belongsTo(Stasiun::class, 'id_stasiun');
    }
}
