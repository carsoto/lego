<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampamentosFechasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campamentos_fechas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('campamentos_id')->unsigned();
            $table->date('fecha_inicio');
            $table->date('fecha_fin');

            $table->index('campamentos_id','fk_campamentos_campamentos_fechas_idx');
        
            $table->foreign('campamentos_id')
                ->references('id')->on('campamentos');

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
        Schema::dropIfExists('campamentos_fechas');
    }
}
