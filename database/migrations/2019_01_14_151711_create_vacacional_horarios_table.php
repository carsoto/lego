<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVacacionalHorariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacacional_horarios', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('vacacional_id')->unsigned();
            $table->string('hora_inicio');
            $table->string('hora_fin');
            $table->decimal('tarifa_ins', 9, 2);
            $table->integer('activo')->default(1);

            $table->index('vacacional_id','fk_vacacional_horarios_idx');
        
            $table->foreign('vacacional_id')
                ->references('id')->on('vacacional');

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
        Schema::dropIfExists('vacacional_horarios');
    }
}
