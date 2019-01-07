<?php

use Illuminate\Database\Seeder;

class InformacionAdicionalTableSeeder extends Seeder
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
			array('pregunta' => '¿Tiene algún problema físico o enfermedad que le limite hacer ejercicios?', 'created_at' => date('Y-m-d')),
			array('pregunta' => '¿Toma algún medicamento?', 'created_at' => date('Y-m-d')),
			array('pregunta' => '¿Tiene alguna alergia: animales, insectos, medicamentos u otros?', 'created_at' => date('Y-m-d')),
        );

        foreach (array_chunk($array_records, 100) as $records) {
              \DB::table('informacion_adicional')->insert($records);
        }
    }
}
