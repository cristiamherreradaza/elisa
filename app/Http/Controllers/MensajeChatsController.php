<?php

namespace App\Http\Controllers;

use App\User;
use App\GruposChats;
use App\MensajeChats;
use App\UserGruposChats;
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

        // dd($request->all());
        
        $grupo_id = $request->input('grupo');

        if($grupo_id != 0){

            $mensajes = MensajeChats::where('grupo_chat_id',$grupo_id)
                                    ->get();

        }else{
            $persona = $request->input('persona');

            $grupo = new GruposChats();

            $id  = Auth::user()->id;

            $grupo->user_id          = $id;
            $grupo->user_id_to       = $persona;
            $grupo->tipo_grupo_id    = 1;

            $grupo->save();

            $grupoPersona = new UserGruposChats();

            $grupoPersona->user_id = $id;
            $grupoPersona->grupo_chat_id = $grupo->id;

            $grupoPersona->save();

            
            $mensajes = MensajeChats::where('grupo_chat_id',$grupo->id)
                                    ->get();

            $grupo_id = $grupo->id;

        }


        return view('chats.ajaxMensaje')->with(compact('mensajes', 'grupo_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function enviaMensaje(Request $request){

        $grupo_id = $request->input('grupo');

        if($grupo_id != 0 ){

            $mensaje = MensajeChats::where('grupo_chat_id',$grupo_id)->get();

            if($mensaje){
                
                $addMessege = new MensajeChats();

                $addMessege->user_id        = Auth::user()->id;
                $addMessege->grupo_chat_id  = $request->input('grupo');
                $addMessege->mensaje        = $request->input('messege');
                $addMessege->fecha          = date('Y-m-d H:s:i');

                $addMessege->save();

            }else{

            }

            $mensajes = MensajeChats::where('grupo_chat_id',$grupo_id)
                                    ->get();

        }else{

        }
        
        return view('chats.ajaxMensaje')->with(compact('mensajes', 'grupo_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function ajaxBuscaPersonaChat(Request $request){

        $querypersonas = User::query();

        $id = Auth::user()->id;

        $querypersonas->whereNotIn('id', [$id]);

        if($request->filled('persona')){

            $persona = $request->input('persona');
            $querypersonas->where('name', 'like', "%$persona%");

            $querypersonas->limit(5);

        }
        
        $personas = $querypersonas->get();

        return view('chats.ajaxBuscaPersonaChat')->with(compact('personas'));

    }

    public function ajaxBuscaParticipanteChat(Request $request){

        $querypersonas = User::query();

        $id = Auth::user()->id;

        $querypersonas->whereNotIn('id', [$id]);

        if($request->filled('persona')){

            $persona = $request->input('persona');
            $querypersonas->where('name', 'like', "%$persona%");

            $querypersonas->limit(5);

        }
        
        $personas = $querypersonas->get();

        return view('chats.ajaxBuscaParticipanteChat')->with(compact('personas'));

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
