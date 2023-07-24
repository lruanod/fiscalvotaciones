<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cierre extends Model
{
    use HasFactory;
    protected $fillable =[
        'conteovotos',
        'mesa_id',
        'partido_id',
        'user_id',
        'acta_id',
    ];

    public function mesa(){
        return $this->belongsTo('App\Models\Mesa');
    }

    public function partido(){
        return $this->belongsTo('App\Models\Partido');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function acta(){
        return $this->belongsTo('App\Models\Acta');
    }



}
