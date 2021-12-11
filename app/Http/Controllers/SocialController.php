<?php

namespace App\Http\Controllers;

use App\Publicacion;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function inicio()
    {

        $publicaciones = Publicacion::orderBy('id', 'desc')
                                    ->get();

        return view('social.inicio')->with(compact('publicaciones'));

    }

    public function muromobil()
    {
        $publicaciones = Publicacion::orderBy('id', 'desc')
                                    ->get();

        return view('social.muromobil')->with(compact('publicaciones'));
    }

    public function guarda(Request $request){

        // dd($request->all());

        $publicacion               = new Publicacion();
        $publicacion->user_id      = 1;
        $publicacion->categoria_id = 1;
        $publicacion->contenido    = $request->input('contenido');
        $publicacion->save();

        return redirect("Social/muromobil");

    }
}
