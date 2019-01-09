<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHorarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horario', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('id')->unsigned();
            $table->integer('locaciones_id')->unsigned();
            $table->integer('desde')->comment('Edad inicio');
            $table->integer('hasta')->comment('Edad fin');
            $table->time('hora_inicio');
            $table->time('hora_fin');
        
            $table->index('locaciones_id','fk_horario_locaciones1_idx');
        
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
        Schema::dropIfExists('horario');
    }
}
