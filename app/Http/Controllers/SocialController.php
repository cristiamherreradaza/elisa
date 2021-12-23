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
        $publicacion->categoria_id = $request->input('categoria_id');
        $publicacion->contenido    = $request->input('publicacion');

        $publicacion->save();

        if($request->has('archivo'))
        {
            $archivo = $request->file('archivo');
            $direccion = 'img_publicaciones/'; // upload path
            $nombreArchivo = date('YmdHis'). "." . $archivo->getClientOriginalExtension();
            $archivo->move($direccion, $nombreArchivo);

            $imagen = new Imagen();
            $imagen->publicacion_id = $publicacion->id;
            $imagen->imagen         = $nombreArchivo;
            $imagen->save();
        }

        // return redirect("Social/muromobil");

        return redirect('/');

    }

    public function ajaxPublicaciones(Request $request){

        $publicaciones = Publicacion::orderBy('id', 'desc')
                                    ->limit(20)
                                    ->get();

        return view('social.ajaxPublicaciones')->with(compact('publicaciones'));
        
    }
}
