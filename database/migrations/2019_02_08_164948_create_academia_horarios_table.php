<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcademiaHorariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academia_horarios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('locaciones_id')->unsigned();
            $table->integer('edad_inicio')->nullable();
            $table->integer('edad_fin')->nullable();
            $table->string('hora_inicio');
            $table->string('hora_fin');
            $table->integer('activo')->default(1);

            $table->index('locaciones_id','fk_locaciones_academia_horarios_idx');
        
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
        Schema::dropIfExists('academia_horarios');
    }
}
