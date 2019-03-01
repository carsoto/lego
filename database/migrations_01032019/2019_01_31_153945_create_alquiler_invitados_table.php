<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlquilerInvitadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alquiler_invitados', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('id')->unsigned();
            $table->integer('alquiler_id')->unsigned();
            $table->integer('invitados_id')->unsigned();
            $table->integer('responsable')->default(0);

            $table->index('invitados_id','fk_alquiler_has_invitados_invitados1_idx');
            $table->index('alquiler_id','fk_alquiler_has_invitados_alquiler1_idx');
        
            $table->foreign('alquiler_id')
                ->references('id')->on('alquiler');
        
            $table->foreign('invitados_id')
                ->references('id')->on('invitados');
        
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
        Schema::dropIfExists('alquiler_invitados');
    }
}
