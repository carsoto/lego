<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcademiaAsistenciaPruebasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academia_asistencia_pruebas', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('id')->unsigned();
            $table->integer('users_id')->unsigned();
            $table->integer('atletas_id')->unsigned();
            $table->date('fecha');
        
            $table->index('atletas_id','fk_academia_asistencia_pruebas_atletas1_idx');
            $table->index('users_id','fk_academia_asistencia_pruebas_users1_idx');
        
            $table->foreign('atletas_id')
                ->references('id')->on('atletas');
        
            $table->foreign('users_id')
                ->references('id')->on('users');
        
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
        Schema::dropIfExists('academia_asistencia_pruebas');
    }
}
