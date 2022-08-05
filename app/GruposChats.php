<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GruposChats extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id', 
        'user_id_to', 
        'tipo_grupo_id',
        'nombre',
        'descripcion',
        'estado',
        'deleted_at',
    ];

    public function user(){

        return $this->belongsTo('App\User', 'user_id_to');

    }

    public function user_to(){

        return $this->belongsTo('App\User', 'user_id');

    }
}
