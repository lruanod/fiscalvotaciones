<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignacionmesa extends Model
{
    use HasFactory;
    protected $fillable =[
        'user_id',
        'mesa_id',
    ];

    public function mesa(){
        return $this->belongsTo('App\Models\Mesa');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

}
