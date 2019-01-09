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
            $table->bigInteger('cedula')->unique();
            $table->string('nombres', 50);
            $table->string('apellidos', 50);
            $table->string('genero', 50);
            $table->date('fecha_nacimiento');
            $table->string('telf_contacto', 15)->nullable();
            $table->string('direccion', 300)->nullable();
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
