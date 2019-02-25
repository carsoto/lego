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
            $table->string('estatus', 191)->default('Regular');
            $table->integer('locaciones_id')->unsigned();
            $table->date('prueba_fecha')->nullable()->default(null);
            $table->integer('activo')->default('1');
        
            $table->index('atletas_id','fk_academia_horarios_has_atletas_atletas1_idx');

            $table->index('locaciones_id','fk_academia_horarios_has_locaciones1_idx');
        
            $table->foreign('atletas_id')
                ->references('id')->on('atletas');

            $table->foreign('locaciones_id')
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
