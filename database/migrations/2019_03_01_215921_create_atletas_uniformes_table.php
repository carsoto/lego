<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtletasUniformesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atletas_uniformes', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('id')->unsigned();
            $table->integer('atletas_id')->unsigned();
            $table->integer('uniformes_id')->unsigned();
            $table->integer('tallas_id')->unsigned();
        
            $table->index('atletas_id','fk_table1_atletas1_idx');
            $table->index('uniformes_id','fk_atletas_uniformes_uniformes1_idx');
            $table->index('tallas_id','fk_atletas_uniformes_tallas1_idx');
        
            $table->foreign('atletas_id')
                ->references('id')->on('atletas');
        
            $table->foreign('uniformes_id')
                ->references('id')->on('uniformes');
        
            $table->foreign('tallas_id')
                ->references('id')->on('tallas');
        
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
        Schema::dropIfExists('atletas_uniformes');
    }
}
