<?php

namespace App\Http\Controllers;

use App\Imagen;
use App\Categoria;
use App\Publicacion;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function inicio()
    {

        $publicaciones = Publicacion::orderBy('id', 'desc')
                                    ->get();

        $categorias = Categoria::all();

        return view('social.inicio')->with(compact('publicaciones','categorias'));

    }

    public function muromobil()
    {
        $publicaciones = Publicacion::orderBy('id', 'desc')
                                    ->get();

        return view('social.muromobil')->with(compact('publicaciones'));
    }

    public function guarda(Request $request){

        // dd($request->session()->get('user')->id);
        // dd($request->all());

        $publicacion               = new Publicacion();

        $publicacion->user_id      = $request->session()->get('user')->id;
        $publicacion->categoria_id = $request->input('categoria');
        $publicacion->contenido    = $request->input('comentario');

        $publicacion->save();


        $imagen = new Imagen();

        $imagen->publicacion_id = $publicacion->id;
        // $imagen->imagen         = $request->input('foto');
        $nombrearchivo          = date('Ymd').'publicacion';

        $foto                   = $request->input('foto');

        $direccion              = 'img_publicaciones/';

        $foto->move($direccion,$nombrearchivo);

        $imagen->save();

        // return redirect("Social/muromobil");

        return redirect('/');

    }
}
