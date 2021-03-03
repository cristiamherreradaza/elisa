<?php

namespace App\Http\Controllers;

use App\Sector;
use Illuminate\Http\Request;

class SectorController extends Controller
{
    public function distritos()
    {
        $distritos = Sector::whereNull('padre_id')
                    ->get();

        return view('sector.distritos')->with(compact('distritos'));
    }

    public function guarda(Request $request)
    {
        // dd($request->all());
        if($request->has('id')){
            $distrito = Sector::find($request->id);
        }else{
            $distrito = new Sector();
        }

        $distrito->nombre       = $request->nombre;
        $distrito->departamento = $request->departamento;
        $distrito->save();

        return redirect('Sector/distritos');

    }
}
