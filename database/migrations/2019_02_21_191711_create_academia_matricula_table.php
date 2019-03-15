<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcademiaMatriculaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academia_matricula', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('id')->unsigned();
            $table->integer('inscripciones_academia_id')->unsigned();
            $table->integer('academia_horarios_id')->unsigned();
            $table->date('fecha');
            $table->integer('mes');
            $table->integer('anyo');
            $table->string('dias_asistencia', 45);
            $table->string('codigo_dupla', 45)->nullable()->default(null);
            $table->integer('activo')->default('1');
        
            $table->index('academia_horarios_id','fk_academia_matricula_academia_horarios1_idx');
            $table->index('inscripciones_academia_id','fk_academia_matricula_inscripciones_academia1_idx');
        
            $table->foreign('academia_horarios_id')
                ->references('id')->on('academia_horarios');
        
            $table->foreign('inscripciones_academia_id')
                ->references('id')->on('inscripciones_academia');
        
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
        Schema::dropIfExists('academia_matricula');
    }
}
