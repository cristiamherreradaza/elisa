<?php

namespace App\Http\Controllers;

use App\Publicidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicidadController extends Controller
{

    public function guarda(Request $request){

        // dd($request->all());

        $publicidad =  new Publicidad();

        $publicidad->user_id        = Auth::user()->id;
        $publicidad->cliente_id     = $request->input('cliente_id');

        $fotos = $request->file('archivo');
        // dd($fotos->getClientOriginalExtension());

        foreach ($fotos as $key => $value) {
            $archivo = $value;
            $direccion = 'img_publicidad/';
            $nombrearchivo = date('YmdHis').$key.'.'.$value->getClientOriginalExtension();

            $archivo->move($direccion,$nombrearchivo);

            $publicidad->banner = $nombrearchivo;
        }

        $publicidad->descripcion                = $request->input('descripcion');
        $publicidad->fecha_inicio               = $request->input('fecha_inicio');
        $publicidad->fecha_fin                  = $request->input('fecha_fin');
        $publicidad->cantidad_publicaciones     = $request->input('cantidad_publicaciones');
        $publicidad->estado                     = "null";

        $publicidad->save();

        return redirect('Cliente/listado');
        
    }
}
