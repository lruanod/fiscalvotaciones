<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partido extends Model
{
    use HasFactory;

    protected $fillable =['tipopartido','nombrepartido','fotopartido'];

    public function partidos() {
        return $this->hasMany('App\Models\Cierre');
    }

}
