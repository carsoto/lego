<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepresentantesRedesSocialesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('representantes_redes_sociales', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->integer('representantes_id')->unsigned();
            $table->integer('redes_sociales_id')->unsigned();
            
            $table->primary('representantes_id', 'redes_sociales_id');
        
            $table->index('redes_sociales_id','fk_representantes_has_redes_sociales_redes_sociales1_idx');
            $table->index('representantes_id','fk_representantes_has_redes_sociales_representantes1_idx');
        
            $table->foreign('representantes_id')
                ->references('id')->on('representantes');
        
            $table->foreign('redes_sociales_id')
                ->references('id')->on('redes_sociales');
        
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
        Schema::drop('representantes_redes_sociales');
    }
}
