<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCamposUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('sector_id')->nullable()->after('id');
            $table->foreign('sector_id')->references('id')->on('sectores');
            $table->unsignedBigInteger('perfil_id')->nullable()->after('id');
            $table->foreign('perfil_id')->references('id')->on('perfiles');
            $table->string('celulares', 30)->nullable()->after('password');
            $table->string('direccion', 200)->nullable()->after('password');
            $table->string('latitud', 30)->nullable()->after('password');
            $table->string('longitud', 30)->nullable()->after('password');
            $table->string('estado', 30)->nullable()->after('password');
            $table->datetime('deleted_at')->nullable()->after('remember_token');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['sector_id']);
            $table->dropColumn('sector_id');
            $table->dropForeign(['perfil_id']);
            $table->dropColumn('perfil_id');
            $table->dropColumn('celulares');
            $table->dropColumn('direccion');
            $table->dropColumn('latitud');
            $table->dropColumn('longitud');
            $table->dropColumn('estado');
            $table->dropColumn('deleted_at');
        });
    }
}
