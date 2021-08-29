<?php

namespace App\Http\Controllers\api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

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

    public function registra(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $usuarioId = $user->id;

        return response()->json(['usuario' => $usuarioId]);
    }
}
