<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MensajeChats extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id', 
        'grupo_chat_id', 
        'tipo_mensaje_id', 
        'mensaje',
        'fecha',
        'file_name',
        'latitud',
        'longitud',
        'estado',
        'deleted_at',
    ];

    public function user(){

        // return $this->belongsTo('App\User', 'user_id_to');
        return $this->belongsTo('App\User', 'user_id');


    }

    // public function user_to(){

    //     return $this->belongsTo('App\User', 'user_id');

    // }
}
