<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrestamosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestamos', function (Blueprint $table) {
            $table->increments('id');
            $table->double('prestamo_valor');
            $table->double('prestamo_tasa');
            $table->string('prestamo_tipo');
            $table->string('prestamo_tiempo_cobro');
            $table->integer('prestamo_numero_cuotas');
            $table->double('prestamo_valor_cuota');
            $table->date('prestamo_fecha');
            $table->date('prestamo_fecha_inicial');
            $table->date('prestamo_fecha_proximo_cobro');
            $table->double('prestamo_valor_total');
            $table->double('prestamo_valor_abonado');
            $table->double('prestamo_valor_proxima_cuota');
            $table->double('prestamo_valor_actual');
            $table->string('prestamo_estado');
            $table->integer('user_id')->unsigned();
            $table->integer('cliente_id')->unsigned();

            $table->foreign('user_id')
                ->references('id')
                ->on('users');

            $table->foreign('cliente_id')
                ->references('id')
                ->on('clientes');

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
        Schema::dropIfExists('prestamos');
    }
}
