<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTarifasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarifas', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('id')->unsigned();
            $table->integer('deportes_id')->unsigned();
            $table->integer('locaciones_id')->unsigned();
            $table->integer('servicios_id')->unsigned();
            $table->integer('periodos_id')->unsigned();
            $table->integer('frecuencia');
            $table->decimal('precio', 9, 2);
            $table->integer('activo')->default(1);
        
            $table->index('servicios_id','fk_tarifas_servicios1_idx');
            $table->index('locaciones_id','fk_tarifas_locaciones1_idx');
            $table->index('periodos_id','fk_tarifas_periodos1_idx');
            $table->index('deportes_id','fk_tarifas_deportes1_idx');
        
            $table->foreign('servicios_id')
                ->references('id')->on('servicios');
        
            $table->foreign('locaciones_id')
                ->references('id')->on('locaciones');
        
            $table->foreign('periodos_id')
                ->references('id')->on('periodos');
        
            $table->foreign('deportes_id')
                ->references('id')->on('deportes');
        
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
        Schema::drop('tarifas');
    }
}
