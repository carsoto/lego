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
            $table->string('estatus')->default('Regular');
            $table->date('prueba_fecha')->nullable();
            $table->integer('prueba_horario_id')->unsigned()->nullable();
            $table->integer('activo')->default(1);
        
            $table->index('atletas_id','fk_academia_horarios_has_atletas_atletas1_idx');
            $table->index('prueba_horario_id','fk_prueba_horario_academia1_idx');
        
            $table->foreign('atletas_id')
                ->references('id')->on('atletas');

            $table->foreign('prueba_horario_id')
                ->references('id')->on('academia_horarios');

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
