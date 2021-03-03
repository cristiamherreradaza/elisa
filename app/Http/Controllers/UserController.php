<?php

namespace App\Http\Controllers;

use App\User;
use App\Sector;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function listado()
    {
    	$usuarios = User::all();
    	// dd($usuarios);
    	return view('user.listado')->with(compact('usuarios'));
    }

    public function nuevo()
    {
        $sectores = Sector::all();
        // dd($sectores);
        
        return view('user.nuevo')->with(compact('usuarios'));        			
    }

    public function ajaxDistrito(Request $request)
    {
        $distritos = Sector::where('departamento', $request->departamento)
                        ->get();
        
        dd($request->all());
    }
}
