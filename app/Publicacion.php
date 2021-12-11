<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Publicacion extends Model
{
    use SoftDeletes;
    protected $table = "publicaciones";

    protected $fillable = [
        'user_id', 
        'categoria_id', 
        'contenido', 
        'estado',
        'deleted_at',
    ];

}
