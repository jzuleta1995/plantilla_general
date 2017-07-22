<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cliente_nombre');
            $table->string('cliente_apellido');
            $table->string('cliente_nombre_completo');
            $table->string('cliente_documento')->unique();
            $table->string('cliente_direccion_casa');
            $table->string('cliente_direccion_trabajo')->nullable();
            $table->string('cliente_lugar_trabajo');
            $table->string('cliente_telefono');
            $table->string('cliente_celular')->nullable();
            $table->string('cliente_ciudad');
            $table->string('cliente_estado');
            $table->integer('calificacion')->nullable();
            $table->integer('user_id')->unsigned();
            $table->integer('cobrador_id')->unsigned();

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users');

            $table->foreign('cobrador_id')
                  ->references('id')
                  ->on('cobradors');

            $table->timestamps();
        });

        Schema::create('fiadors', function (Blueprint $table){

            $table->integer('id');
            $table->integer('cliente_id')->unsigned();
            $table->string('fiador_nombre');
            $table->string('fiador_apellido');
            $table->string('fiador_nombre_completo');
            $table->string('fiador_documento');
            $table->string('fiador_direccion_casa');
            $table->string('fiador_direccion_trabajo')->nullable();
            $table->string('fiador_telefono');
            $table->primary(['cliente_id', 'id']);
            $table->timestamps();

            $table->foreign('cliente_id')
                  ->references('id')
                  ->on('clientes');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fiadors');
        Schema::dropIfExists('clientes');
    }
}
