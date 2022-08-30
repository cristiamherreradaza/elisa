<?php

namespace App\Http\Controllers;

use App\User;
use App\GruposChats;
use App\MensajeChats;
use App\UserGruposChats;
use App\ParticipanteGrupo;
use Illuminate\Support\Arr;
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

        // PARA LOS GRUPOS
        $grupos = GruposChats::select('grupos_chats.id', 'grupos_chats.nombre', 'grupos_chats.descripcion')
                            ->join('participante_grupos', 'grupos_chats.id', '=', 'participante_grupos.grupo_chat_id')
                            ->where(function($query) use ($id){
                                $query->where('tipo_grupo_id', 2)
                                ->where('grupos_chats.user_id', $id);
                            })
                            ->orWhere(function($query) use ($id){
                                $query->where('participante_grupos.user_id', $id);  
                            })
                            ->groupBy('grupos_chats.id')
                            ->get();
        
        return view('chats.chat')->with(compact('users', 'grupos'));
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

                $addMessege->user_id            = Auth::user()->id;
                $addMessege->grupo_chat_id      = $request->input('grupo');
                $addMessege->tipo_mensaje_id    = 1;
                $addMessege->mensaje            = $request->input('messege');
                $addMessege->fecha              = date('Y-m-d H:s:i');

                $addMessege->save();

            }else{

            }

            $mensajes = MensajeChats::where('grupo_chat_id',$grupo_id)
                                    ->get();

        }else{

        }

        $tipo_chat = $request->input('tipo');
        if($tipo_chat == 2){
            return view('chats.ajaxMensajeGrupo')->with(compact('mensajes', 'grupo_id'));
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

    public function guardarPeopleGroup(Request $request){

        if($request->ajax()){

            $grupo_chat_id   = $request->input('grupo_chat_id');

            if($grupo_chat_id == 0){
                $grupo_chat = new GruposChats();
            }else{
                $grupo_chat = GruposChats::find($grupo_chat_id);
            }

            $grupo_chat->user_id        = Auth::user()->id;
            $grupo_chat->tipo_grupo_id  = 2;
            $grupo_chat->nombre         = $request->input('grupo_name');
            $grupo_chat->descripcion    = $request->input('grupo_descripcion');

            $grupo_chat->save();


            // GAREGAMOS AL NUEVO GRUPO
            if($grupo_chat_id == 0){
                $grupo_chatNew = new ParticipanteGrupo();
                $grupo_chatNew->user_id        = Auth::user()->id;
                $grupo_chatNew->grupo_chat_id  = $grupo_chat->id;

                $grupo_chatNew->save();
            }

            
            $data['status'] = 'success';
            $data['grupo_chat_id'] = $grupo_chat->id;

            return json_encode($data);

        }

    }

    public function ajaxAdicionaParticipante(Request $request){
        
        if($request->ajax()){

            
            $grupo_chat_id   = $request->input('grupo');

            $grupo_chat = new ParticipanteGrupo();
            $grupo_chat->user_id        = $request->input('participante');
            $grupo_chat->grupo_chat_id  = $grupo_chat_id;

            $grupo_chat->save();

            $participantes = ParticipanteGrupo::where('grupo_chat_id', $grupo_chat_id)
                                                ->get();

            return view('chats.ajaxAdicionaParticipante')->with(compact('participantes'));

        }

    }

    public function ajaxListadoParticipante(Request $request){
        
        if($request->ajax()){

            
            $grupo_chat_id   = $request->input('grupo');

            $participantes = ParticipanteGrupo::where('grupo_chat_id', $grupo_chat_id)
                                                ->get();

            return view('chats.ajaxAdicionaParticipante')->with(compact('participantes'));

        }

    }

    public function ajaxMensajeGrupo(Request $request){
        if($request->ajax()){

            $grupo_id = $request->input('grupo');

            $mensajes = MensajeChats::where('grupo_chat_id', $grupo_id)
                                    ->get();

            return view('chats.ajaxMensajeGrupo')->with(compact('mensajes', 'grupo_id'));

        }
    }

    public function eliminaParticipanteGrupoChat(Request $request){
        if($request->ajax()){

            $participante_id = $request->input('participante');
            $grupo_chat_id = $request->input('grupo');

            ParticipanteGrupo::destroy($participante_id);
            
            $participantes = ParticipanteGrupo::where('grupo_chat_id', $grupo_chat_id)
                                                ->get();

            return view('chats.ajaxAdicionaParticipante')->with(compact('participantes'));
        }
    }

    //Mensajes de panicos
    public function ajaxBuscaGrupoPanico(Request $request){

        if($request->ajax()){
            $grupo = $request->input('grupo');
            $grupos = GruposChats::where('nombre', 'like', "%$grupo%")
                                    ->limit(2)
                                    ->get();

            return view('chats.ajaxBuscaGrupoPanico')->with(compact('grupos'));
        }
    }

    public function ajaxListaGrupoPanico(Request $request){
        // dd($request->input('grupo'));
        if($request->ajax()){     
            $grupos = $request->input('grupo');
            
            return view('chats.ajaxListaGrupoPanico')->with(compact('grupos'));
        }
    }

    public function enviaMensajePanico(Request $request){
        // dd($request->input('grupo'));
        if($request->ajax()){
            $grupos = $request->input('grupo');
            foreach($grupos as $g){

                $addMessege = new MensajeChats();
        
                $addMessege->user_id            = Auth::user()->id;
                $addMessege->grupo_chat_id      = (int)$g;
                $addMessege->tipo_mensaje_id    = 1;
                $addMessege->estado             = 'panico';
                $addMessege->mensaje            = $request->input('messege');
                $addMessege->fecha              = date('Y-m-d H:s:i');
        
                $addMessege->save();
            }
        }
    }

    public function enviaAudio(Request $request){

        if($request->has('audio')){
            $grupos = explode(',',$request->input('grupo'));
            $archivo = $request->file('audio');
            $direccion = 'audiosPanicos/'; // upload path
            $nombreArchivo = date('YmdHis'). ".mp3";
            $archivo->move($direccion, $nombreArchivo);
            foreach($grupos as $g){
                $mensajeChats = new MensajeChats();

                $mensajeChats->user_id              = Auth::user()->id;
                $mensajeChats->grupo_chat_id        = (int)$g;
                $mensajeChats->tipo_mensaje_id      = 2;
                $mensajeChats->estado               = 'panico';
                $mensajeChats->fecha                = date('Y-m-d H:s:i');
                $mensajeChats->file_name            = $nombreArchivo;
                $mensajeChats->latitud              = $request->input('longitud');
                $mensajeChats->longitud             = $request->input('latitude');

                $mensajeChats->save();
            }
        }

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
