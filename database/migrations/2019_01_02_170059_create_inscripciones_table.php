<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInscripcionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscripciones', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('id')->unsigned();
            $table->integer('atletas_id')->unsigned();
            $table->integer('tarifas_id')->unsigned();
            $table->integer('promociones_id')->unsigned()->nullable();
            $table->date('fecha_inicio');
        
            $table->index('atletas_id','fk_inscripciones_atletas1_idx');
            $table->index('tarifas_id','fk_inscripciones_tarifas1_idx');
            $table->index('promociones_id','fk_inscripciones_promociones1_idx');
        
            $table->foreign('atletas_id')
                ->references('id')->on('atletas');
        
            $table->foreign('tarifas_id')
                ->references('id')->on('tarifas');
        
            $table->foreign('promociones_id')
                ->references('id')->on('promociones');
        
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
        Schema::drop('inscripciones');
    }
}
