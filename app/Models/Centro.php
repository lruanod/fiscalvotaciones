<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Centro extends Model
{
    use HasFactory;
    protected $fillable =[
        'nombrecentro',
        'sector_id'
    ];

    public function sector(){
        return $this->belongsTo('App\Models\Sector');
    }

    public  function centros(){
        return $this->hasMany('App\Models\Mesa');
    }



}
