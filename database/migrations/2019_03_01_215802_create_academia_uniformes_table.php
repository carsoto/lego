<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcademiaUniformesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academia_uniformes', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('id')->unsigned();
            $table->integer('uniformes_id')->unsigned();
            $table->integer('tallas_id')->unsigned();
            $table->integer('colores_id')->unsigned();
            $table->string('imagen', 500);
            $table->integer('en_stock')->nullable();
            $table->integer('activo')->default(1);
        
            $table->index('uniformes_id','fk_table1_uniformes1_idx');
            $table->index('tallas_id','fk_table1_tallas1_idx');
            $table->index('colores_id','fk_table1_colores1_idx');
        
            $table->foreign('uniformes_id')
                ->references('id')->on('uniformes');
        
            $table->foreign('tallas_id')
                ->references('id')->on('tallas');
        
            $table->foreign('colores_id')
                ->references('id')->on('colores');
        
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
        Schema::dropIfExists('academia_uniformes');
    }
}
