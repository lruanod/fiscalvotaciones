<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    use HasFactory;

    protected $fillable =['nombresector'];

    public function sectors() {
        return $this->hasMany('App\Models\Centro');
    }

    public  function centros(){
        return $this->hasMany('App\Models\Centro');
    }

}
