<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acta extends Model
{
    use HasFactory;
    protected $fillable =[
        'votosasignadosacta',
        'diferencia',
        'total',
        'fotoacta',
        'tipopartidoacta',
        'mesa_id',
        'user_id',
    ];

    public function mesa(){
        return $this->belongsTo('App\Models\Mesa');
    }
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public  function actas(){
        return $this->hasMany('App\Models\Cierre');
    }
}
