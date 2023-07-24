<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{
    use HasFactory;
    protected $fillable =[
        'numeromesa',
        'votosasignados',
        'centro_id'
    ];

    public function centro(){
        return $this->belongsTo('App\Models\Centro');
    }

    public  function mesas(){
        return $this->hasMany('App\Models\Cierre','App\Models\Acta','App\Models\Asignacionmesa');
    }


}
