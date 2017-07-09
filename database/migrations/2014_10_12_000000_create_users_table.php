<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('documento')->unique();
            $table->string('direccion')->nullable();
            $table->string('telefono')->nullable();
            $table->string('email')->unique();
            $table->integer('pregunta_id')->nullable();
            $table->string('respuesta_secreta')->nullable();
            $table->string('password')->nullable();
            $table->string('tipo_usuario');
            $table->string('estado');



            /**$table->foreign('pregunta_id')
                    ->references('id')
                    ->on('preguntasecreta')
                    ->onDelete('cascade');**/

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
}
