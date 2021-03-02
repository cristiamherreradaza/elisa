<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

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
        
        return view('user.listado')->with(compact('usuarios'));        			
    }
}
