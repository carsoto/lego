<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcademiaAsistenciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academia_asistencia', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('id')->unsigned();
            $table->integer('users_id')->unsigned();
            $table->integer('academia_matricula_id')->unsigned();
            $table->date('fecha');
            $table->integer('mes');
            $table->integer('anyo');
        
            $table->index('users_id','fk_academia_asistencia_users1_idx');
            $table->index('academia_matricula_id','fk_academia_asistencia_academia_matricula1_idx');
        
            $table->foreign('users_id')
                ->references('id')->on('users');
        
            $table->foreign('academia_matricula_id')
                ->references('id')->on('academia_matricula');
        
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
        Schema::dropIfExists('academia_asistencia');
    }
}
