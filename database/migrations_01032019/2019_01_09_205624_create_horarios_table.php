<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHorariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horarios', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('id')->unsigned();
            $table->integer('locaciones_id')->unsigned();
            $table->integer('desde')->comment('Edad inicio');
            $table->integer('hasta')->comment('Edad fin');
            $table->string('hora_inicio');
            $table->string('hora_fin');
        
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
        Schema::dropIfExists('horarios');
    }
}
