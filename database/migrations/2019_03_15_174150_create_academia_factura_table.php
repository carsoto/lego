<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcademiaFacturaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academia_factura', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('id')->unsigned();
            $table->integer('representantes_id')->unsigned();
            $table->date('fecha');
            $table->decimal('subtotal', 9, 2);
            $table->decimal('descuento', 9, 2);
            $table->decimal('total', 9, 2);
            $table->string('status', 45);
            $table->string('tipo_pago', 100);
        
            $table->index('representantes_id','fk_academia_factura_representantes1_idx');
        
            $table->foreign('representantes_id')
                ->references('id')->on('representantes');
        
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
        Schema::dropIfExists('academia_factura');
    }
}
