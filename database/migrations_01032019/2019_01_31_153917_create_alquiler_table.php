<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlquilerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alquiler', function(Blueprint $table) {
             $table->engine = 'InnoDB';
        
            $table->increments('id')->unsigned();
            $table->integer('locaciones_id')->unsigned();
            $table->date('fecha');
            $table->string('hora_inicio', 45);
            $table->string('hora_fin', 45);
            $table->integer('cancha');
            $table->string('status', 45);
            $table->decimal('pago', 9, 2);
        
            $table->index('locaciones_id','fk_alquiler_locaciones1_idx');
        
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
        Schema::dropIfExists('alquiler');
    }
}
