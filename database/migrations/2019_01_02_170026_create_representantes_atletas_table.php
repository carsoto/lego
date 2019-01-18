<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepresentantesAtletasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('representantes_atletas', function(Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id')->unsigned();

            $table->integer('representantes_id')->unsigned();
            $table->integer('atletas_id')->unsigned();
        
            $table->index('atletas_id','fk_representantes_has_atletas_atletas1_idx');
            $table->index('representantes_id','fk_representantes_has_atletas_representantes1_idx');
        
            $table->foreign('representantes_id')
                ->references('id')->on('representantes');
        
            $table->foreign('atletas_id')
                ->references('id')->on('atletas');
        
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
        Schema::drop('representantes_atletas');
    }
}
