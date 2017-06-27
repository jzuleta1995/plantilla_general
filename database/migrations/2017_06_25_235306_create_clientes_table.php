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

            $table->string('nombre');
            $table->string('apellido');
            $table->string('documento')->unique();
            $table->string('direccion_casa');
            $table->string('direccion_trabajo')->nullable();
            $table->string('telefono');
            $table->string('celular')->nullable();
            $table->string('estado');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->timestamps();
        });

        Schema::create('item_clientes', function (Blueprint $table){

            $table->integer('id');
            $table->integer('cliente_id')->unsigned();
            $table->string('nombre_fiador');
            $table->string('apellido_fiador');
            $table->string('documento_fiador');
            $table->string('direccion_casa_fiador');
            $table->string('direccion_trabajo_fiador')->nullable();
            $table->string('telefono_fiador');
            $table->primary(['cliente_id', 'id']);
            $table->timestamps();

            $table->foreign('cliente_id')
                ->references('id')
                ->on('clientes')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
        Schema::dropIfExists('item_clientes');
    }
}
