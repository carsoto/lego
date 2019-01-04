<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtletasRedesSocialesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atletas_redes_sociales', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->integer('atletas_id')->unsigned();
            $table->integer('redes_sociales_id')->unsigned();
            
            $table->primary('atletas_id', 'redes_sociales_id');
        
            $table->index('redes_sociales_id','fk_atletas_has_redes_sociales_redes_sociales1_idx');
            $table->index('atletas_id','fk_atletas_has_redes_sociales_atletas1_idx');
        
            $table->foreign('atletas_id')
                ->references('id')->on('atletas');
        
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
        Schema::drop('atletas_redes_sociales');
    }
}
