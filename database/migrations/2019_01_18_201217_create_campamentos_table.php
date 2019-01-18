<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campamentos', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('locaciones_id')->unsigned();
            $table->string('descripcion');
            $table->integer('edad_inicio');
            $table->integer('edad_fin');
            $table->decimal('tarifa_ins', 9, 2);
            $table->integer('porcentaje_individual')->nullable();
            $table->integer('porcentaje_grupal')->nullable();
            $table->date('fecha_limite');
            $table->integer('activo')->default(1);

            $table->index('locaciones_id','fk_locaciones_campamentos_idx');
        
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
        Schema::dropIfExists('campamentos');
    }
}
