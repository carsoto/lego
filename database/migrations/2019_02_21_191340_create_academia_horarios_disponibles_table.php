<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcademiaHorariosDisponiblesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academia_horarios_disponibles', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('id')->unsigned();
            $table->integer('academia_horarios_id')->unsigned();
            $table->integer('locaciones_id')->unsigned();
            $table->integer('academia_tarifas_id')->unsigned();
            $table->integer('activo')->default(1);
        
            $table->index('academia_horarios_id','fk_table1_academia_horarios1_idx');
            $table->index('locaciones_id','fk_table1_locaciones1_idx');
            $table->index('academia_tarifas_id','fk_table1_academia_tarifas1_idx');
        
            $table->foreign('academia_horarios_id')
                ->references('id')->on('academia_horarios');
        
            $table->foreign('locaciones_id')
                ->references('id')->on('locaciones');
        
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
        Schema::dropIfExists('academia_horarios_disponibles');
    }
}
