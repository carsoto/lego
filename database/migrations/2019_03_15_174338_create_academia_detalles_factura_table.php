<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcademiaDetallesFacturaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academia_detalles_factura', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('id')->unsigned();
            $table->integer('academia_factura_id')->unsigned();
            $table->integer('inscripciones_academia_id')->unsigned();
            $table->decimal('pago', 9, 2);
        
            $table->index('academia_factura_id','fk_academia_detalles_factura_academia_factura1_idx');
            $table->index('inscripciones_academia_id','fk_academia_detalles_factura_inscripciones_academia1_idx');
        
            $table->foreign('academia_factura_id')
                ->references('id')->on('academia_factura');
        
            $table->foreign('inscripciones_academia_id')
                ->references('id')->on('inscripciones_academia');
        
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
        Schema::dropIfExists('academia_detalles_factura');
    }
}
