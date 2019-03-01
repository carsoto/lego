<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampamentosHorariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campamentos_horarios', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('campamentos_id')->unsigned();
            $table->string('descripcion', 191);
            $table->decimal('tarifa_ins', 9, 2);
            $table->integer('activo')->default('1');

            $table->index('campamentos_id','fk_campamentos_horarios_campamentos1_idx');

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
        Schema::dropIfExists('campamentos_horarios');
    }
}
