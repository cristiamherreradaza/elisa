<?php

namespace App\Http\Controllers;

use App\User;
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

        $users = User::Where('id','!=',$id)->get();
        
        return view('chats.chat')->with(compact('users'));
    }

    public function index()
    {
        //
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
