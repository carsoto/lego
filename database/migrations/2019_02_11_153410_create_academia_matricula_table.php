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
            $table->integer('atletas_id')->unsigned();
            $table->integer('academia_horarios_tarifas_id')->unsigned();
            $table->date('fecha');
            $table->integer('mes');
            $table->integer('anyo');
            $table->string('codigo_dupla', 45)->nullable();
            $table->integer('activo')->default(1);
        
            $table->index('academia_horarios_tarifas_id','fk_academia_matricula_academia_horarios_tarifas1_idx');
            $table->index('atletas_id','fk_academia_matricula_atletas1_idx');
        
            $table->foreign('academia_horarios_tarifas_id')
                ->references('id')->on('academia_horarios_tarifas');
        
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
        Schema::dropIfExists('academia_matricula');
    }
}
