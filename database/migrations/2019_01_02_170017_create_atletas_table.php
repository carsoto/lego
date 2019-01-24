<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtletasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atletas', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('id')->unsigned();
            $table->bigInteger('cedula')->unique()->nullable();
            $table->string('nombre', 80);
            $table->string('apellido', 80);
            $table->string('genero', 50);
            $table->date('fecha_nacimiento');
            $table->string('red_social', 150)->nullable();
            $table->string('telf_contacto', 15)->nullable();
            $table->string('instituto', 100)->nullable();
            $table->string('email', 150)->nullable();
            $table->integer('talla_top')->nullable();
            $table->integer('talla_camiseta')->nullable();

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
        Schema::drop('atletas');
    }
}
