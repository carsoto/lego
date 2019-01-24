<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampamentosFechasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campamentos_fechas', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('campamentos_horarios_id')->unsigned();
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
        
            $table->index('campamentos_horarios_id','fk_campamentos_fechas_campamentos_horarios1_idx');
        
            $table->foreign('campamentos_horarios_id')
                ->references('id')->on('campamentos_horarios');
        
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
        Schema::dropIfExists('campamentos_fechas');
    }
}
