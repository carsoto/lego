<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcademiaHorariosTarifasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academia_horarios_tarifas', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('id')->unsigned();
            $table->integer('academia_horarios_id')->unsigned();
            $table->integer('academia_tarifas_id')->unsigned();
            $table->integer('activo')->default(1);
        
            $table->index('academia_tarifas_id','fk_academia_horarios_has_academia_tarifas_academia_tarifas1_idx');
            $table->index('academia_horarios_id','fk_academia_horarios_has_academia_tarifas_academia_horarios_idx');
        
            $table->foreign('academia_horarios_id')
                ->references('id')->on('academia_horarios');
        
            $table->foreign('academia_tarifas_id')
                ->references('id')->on('academia_tarifas');
        
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
        Schema::dropIfExists('academia_horarios_tarifas');
    }
}
