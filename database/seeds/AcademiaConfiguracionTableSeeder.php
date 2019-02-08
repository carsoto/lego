<?php

use Illuminate\Database\Seeder;

class AcademiaConfiguracionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        set_time_limit(0);

        $array_records = array (
			array('tipo' => 'Prueba', 'configuracion' => 'Locaciones', 'valor' => '1,2', 'created_at' => date('Y-m-d')),
            array('tipo' => 'Academia', 'configuracion' => 'Locaciones', 'valor' => '1,2', 'created_at' => date('Y-m-d')),
			array('tipo' => 'Prueba', 'configuracion' => 'Duración de la clase', 'valor' => '90', 'created_at' => date('Y-m-d')),
            array('tipo' => 'Academia', 'configuracion' => 'Duración de la clase', 'valor' => '90', 'created_at' => date('Y-m-d')),
            array('tipo' => 'Prueba', 'configuracion' => 'Dias de clases', 'valor' => '1,2,3,4', 'created_at' => date('Y-m-d')),
            array('tipo' => 'Academia', 'configuracion' => 'Dias de clases', 'valor' => '1,2,3,4', 'created_at' => date('Y-m-d')),
        );

        foreach (array_chunk($array_records, 100) as $records) {
        	\DB::table('academia_configuracion')->insert($records);
        }
    }
}
