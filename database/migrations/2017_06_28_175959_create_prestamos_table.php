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

            $table->double('valor_prestamo');
            $table->double('tasa');
            $table->string('tipo_prestamo');
            $table->string('tiempo_cobro')->nullable();
            $table->integer('cantidad_cuotas_pagar');
            $table->double('valor_cuota_pagar')->nullable();
            $table->date('fecha_prestamo');

            $table->date('fecha_inicio_prestamo');
            $table->date('fecha_proximo_cobro')->nullable();
            $table->double('valor_total_deuda');
            $table->double('valor_abono_deuda')->nullable();
            $table->double('valor_proximo_pago_deuda');
            $table->string('estado');

            $table->integer('user_id')->unsigned();
            $table->integer('cliente_id')->unsigned();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('cliente_id')
                ->references('id')
                ->on('clientes')
                ->onDelete('cascade');

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
