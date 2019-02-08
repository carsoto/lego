<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInscripcionesAcademiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('inscripciones_academia', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('id')->unsigned();
            $table->integer('atletas_id')->unsigned();
            $table->date('fecha_inscripcion');
            $table->string('estatus')->default('Prueba');
            $table->date('prueba_fecha')->nullable();
            $table->integer('prueba_locacion_id')->unsigned()->nullable();
            $table->string('horario')->nullable();
            $table->integer('activo')->default(1);
        
            $table->index('atletas_id','fk_academia_horarios_has_atletas_atletas1_idx');
            $table->index('prueba_locacion_id','fk_prueba_locacion_inscripciones_academia1_idx');
        
            $table->foreign('atletas_id')
                ->references('id')->on('atletas');

            $table->foreign('prueba_locacion_id')
                ->references('id')->on('locaciones');
        
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
        Schema::dropIfExists('inscripciones_academia');
    }
}
