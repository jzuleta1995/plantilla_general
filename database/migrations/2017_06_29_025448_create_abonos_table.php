<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbonosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abonos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cliente_id')->unsigned();
            $table->integer('prestamo_id')->unsigned();
            $table->double('abono_valor_cuota');
            $table->double('abono_valor');
            $table->date('abono_fecha');
            $table->string('abono_observacion');
            $table->string('abono_tipo_pago');
            $table->string('abono_estado');
            $table->integer('user_id')->unsigned();

            $table->foreign('cliente_id')
                  ->references('id')
                  ->on('clientes');

            $table->foreign('prestamo_id')
                  ->references('id')
                  ->on('prestamos');

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
        Schema::dropIfExists('abonos');
    }
}
