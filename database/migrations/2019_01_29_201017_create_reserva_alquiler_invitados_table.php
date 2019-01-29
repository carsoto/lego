<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservaAlquilerInvitadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserva_alquiler_invitados', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('id')->unsigned();
            $table->integer('reserva_alquiler_id')->unsigned();
            $table->integer('reserva_invitados_id')->unsigned();
            $table->integer('responsable')->nullable();
        
            $table->index('reserva_invitados_id','fk_reserva_alquiler_has_reserva_invitados_reserva_invitados_idx');
            $table->index('reserva_alquiler_id','fk_reserva_alquiler_has_reserva_invitados_reserva_alquiler1_idx');
        
            $table->foreign('reserva_alquiler_id')
                ->references('id')->on('reserva_alquiler');
        
            $table->foreign('reserva_invitados_id')
                ->references('id')->on('reserva_invitados');
        
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
        Schema::dropIfExists('reserva_alquiler_invitados');
    }
}
