<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCobradorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cobradors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cobrador_nombre');
            $table->string('cobrador_apellido');
            $table->string('cobrador_nombre_completo');
            $table->string('cobrador_documento')->unique();
            $table->string('cobrador_direccion');
            $table->string('cobrador_telefono')->nullable();
            $table->string('cobrador_celular');
            $table->string('cobrador_ciudad');
            $table->string('cobrador_estado');
            $table->integer('user_id')->unsigned();

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users');

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
        Schema::dropIfExists('cobradors');
    }
}
