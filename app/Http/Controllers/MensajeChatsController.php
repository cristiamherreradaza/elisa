<?php

namespace App\Http\Controllers;

use App\User;
use App\GruposChats;
use App\MensajeChats;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MensajeChatsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function chat(Request $request){

        $id = Auth::user()->id;

        $users = GruposChats::where('user_id',$id)
                            ->orWhere('user_id_to',$id)
                            ->get();
        
        return view('chats.chat')->with(compact('users'));
    }

    public function ajaxMensaje(Request $request){
        
        $grupo_id = $request->input('grupo');

        $mensajes = MensajeChats::where('grupo_chat_id',$grupo_id)
                                ->get();

        return view('chats.ajaxMensaje')->with(compact('mensajes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MensajeChats  $mensajeChats
     * @return \Illuminate\Http\Response
     */
    public function show(MensajeChats $mensajeChats)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MensajeChats  $mensajeChats
     * @return \Illuminate\Http\Response
     */
    public function edit(MensajeChats $mensajeChats)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MensajeChats  $mensajeChats
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MensajeChats $mensajeChats)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MensajeChats  $mensajeChats
     * @return \Illuminate\Http\Response
     */
    public function destroy(MensajeChats $mensajeChats)
    {
        //
    }
}
