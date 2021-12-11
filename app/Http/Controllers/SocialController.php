<?php

namespace App\Http\Controllers;

use App\Publicacion;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function inicio()
    {
        return view('social.inicio');
    }

    public function muromobil()
    {
        $publicaciones = Publicacion::all();

        return view('social.muromobil')->with(compact('publicaciones'));
    }
}
