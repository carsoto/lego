<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcademiaFacturaAbonosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academia_factura_abonos', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('id')->unsigned();
            $table->integer('users_id')->unsigned();
            $table->integer('academia_factura_id')->unsigned();
            $table->date('fecha');
            $table->decimal('monto', 9, 2);
            $table->string('tipo_pago', 45);
        
            $table->index('academia_factura_id','fk_academia_factura_abonos_academia_factura1_idx');
            $table->index('users_id','fk_academia_factura_abonos_users1_idx');
        
            $table->foreign('academia_factura_id')
                ->references('id')->on('academia_factura');
        
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
        Schema::dropIfExists('academia_factura_abonos');
    }
}
