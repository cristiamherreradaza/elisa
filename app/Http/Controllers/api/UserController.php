<?php

namespace App\Http\Controllers\api;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function familiares(Request $request)
    {
        $usuarios           = new User();
        $usuarios->name     = $request->name;
        $usuarios->email    = $request->email;
        $usuarios->password = $request->password;
        $usuarios->perfil   = 'Cliente';
        $usuarios->save();
    }

    public function inicio()
    {
        return response()->json(['mensaje'=>'Hola mundo']);
    }
}
