<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocalizacionController extends Controller
{
    public function mapa(){

        return view('localizacion.mapa');
    }
}
