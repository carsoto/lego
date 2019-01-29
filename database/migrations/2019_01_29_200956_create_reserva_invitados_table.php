<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservaInvitadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserva_invitados', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('id')->unsigned();
            $table->bigInteger('cedula');
            $table->string('nombres', 45);
            $table->string('apellidos', 45);
            $table->string('email', 45);
            $table->string('telefono', 15);
            $table->string('red_social', 100);
            $table->decimal('pago', 9, 2);
            $table->integer('activo')->default(1);
        
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
        Schema::dropIfExists('reserva_invitados');
    }
}
