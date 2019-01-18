<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVacacionalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacacional', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('locaciones_id')->unsigned();
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->date('fecha_limite');
            $table->integer('edad_inicio');
            $table->integer('edad_fin');
            $table->integer('porcentaje_individual');
            $table->integer('porcentaje_grupal');
            $table->integer('activo')->default(1);

            $table->index('locaciones_id','fk_locaciones_vacacional_idx');
        
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
        Schema::dropIfExists('vacacional');
    }
}
