<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtletasInformacionAdicionalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atletas_informacion_adicional', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            
            $table->increments('id')->unsigned();

            $table->integer('atletas_id')->unsigned();
            $table->integer('informacion_adicional_id')->unsigned();
            $table->string('respuesta', 150);
        
            $table->index('informacion_adicional_id','fk_atletas_has_informacion_adicional_informacion_adicional1_idx');
            $table->index('atletas_id','fk_atletas_has_informacion_adicional_atletas1_idx');
        
            $table->foreign('atletas_id')
                ->references('id')->on('atletas');
        
            $table->foreign('informacion_adicional_id')
                ->references('id')->on('informacion_adicional');
        
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
        Schema::drop('atletas_informacion_adicional');
    }
}
