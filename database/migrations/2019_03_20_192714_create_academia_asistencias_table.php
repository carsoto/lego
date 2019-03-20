<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcademiaAsistenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academia_asistencias', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('id')->unsigned();
            $table->integer('users_id')->unsigned();
            $table->integer('atletas_id')->unsigned();
            $table->date('fecha');
            $table->integer('mes');
            $table->integer('anyo');
            $table->integer('locaciones_id')->unsigned();
            $table->integer('academia_horarios_id')->unsigned();
            $table->string('modalidad');
        
            $table->index('atletas_id','fk_academia_asistencia_atletas1_idx');
            $table->index('users_id','fk_academia_asistencia_users1_idx');
            $table->index('locaciones_id','fk_academia_asistencia_locaciones1_idx');
            $table->index('academia_horarios_id','fk_academia_asistencia_academia_horarios1_idx');
        
            $table->foreign('atletas_id')
                ->references('id')->on('atletas');
        
            $table->foreign('users_id')
                ->references('id')->on('users');
        
            $table->foreign('locaciones_id')
                ->references('id')->on('locaciones');
        
            $table->foreign('academia_horarios_id')
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
        Schema::dropIfExists('academia_asistencias');
    }
}
