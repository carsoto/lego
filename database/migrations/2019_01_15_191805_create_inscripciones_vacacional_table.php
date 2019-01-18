<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInscripcionesVacacionalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscripciones_vacacional', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('id')->unsigned();
            $table->integer('atletas_id')->unsigned();
            $table->integer('vacacional_horarios_id')->unsigned();
            $table->decimal('tarifa', 9, 2);
            $table->integer('descuento')->nullable();
            $table->decimal('pago', 9, 2);
            $table->date('fecha_inscripcion');
            $table->integer('activo')->default(1);
        
            $table->index('atletas_id','fk_vacacional_horarios_has_atletas_atletas1_idx');
            $table->index('vacacional_horarios_id','fk_vacacional_horarios_has_atletas_vacacional_horarios1_idx');
        
            $table->foreign('vacacional_horarios_id')
                ->references('id')->on('vacacional_horarios');
        
            $table->foreign('atletas_id')
                ->references('id')->on('atletas');
        
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
        Schema::dropIfExists('inscripciones_vacacional');
    }
}
