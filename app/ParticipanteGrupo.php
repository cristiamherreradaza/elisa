<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ParticipanteGrupo extends Model
{
    
    use SoftDeletes;

    protected $fillable = [

        'user_id', 
        'grupo_chat_id', 
        'estado', 
        'deleted_at',
        
    ];   

}
