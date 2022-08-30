<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTipoMensajeIdFileToMensajeChats extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mensaje_chats', function (Blueprint $table) {
            $table->unsignedBigInteger('tipo_mensaje_id')->nullable()->after('grupo_chat_id');
            $table->foreign('tipo_mensaje_id')->references('id')->on('tipo_mensajes');
            $table->string('file_name')->nullable()->after('fecha');
            $table->string('latitud')->nullable()->after('file_name');
            $table->string('longitud')->nullable()->after('latitud');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mensaje_chats', function (Blueprint $table) {
            $table->dropForeign(['tipo_mensaje_id']);
            $table->dropColumn('tipo_mensaje_id');
            $table->dropColumn('file_name');
            $table->dropColumn('latitud');
            $table->dropColumn('longitud');
        });
    }
}
