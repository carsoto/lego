<?php

use Illuminate\Database\Seeder;

class AcademiaHorariosDisponiblesTableSeeder extends Seeder
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
            array('academia_horarios_id' => 1, 'locaciones_id' => 1, 'academia_tarifas_id' => 1, 'activo' => 1, 'created_at' => date('Y-m-d')),
            array('academia_horarios_id' => 1, 'locaciones_id' => 1, 'academia_tarifas_id' => 2, 'activo' => 1, 'created_at' => date('Y-m-d')),
            array('academia_horarios_id' => 1, 'locaciones_id' => 1, 'academia_tarifas_id' => 3, 'activo' => 1, 'created_at' => date('Y-m-d')),
            array('academia_horarios_id' => 1, 'locaciones_id' => 1, 'academia_tarifas_id' => 4, 'activo' => 1, 'created_at' => date('Y-m-d')),
            array('academia_horarios_id' => 1, 'locaciones_id' => 2, 'academia_tarifas_id' => 1, 'activo' => 1, 'created_at' => date('Y-m-d')),
            array('academia_horarios_id' => 1, 'locaciones_id' => 2, 'academia_tarifas_id' => 2, 'activo' => 1, 'created_at' => date('Y-m-d')),
            array('academia_horarios_id' => 1, 'locaciones_id' => 2, 'academia_tarifas_id' => 3, 'activo' => 1, 'created_at' => date('Y-m-d')),
            array('academia_horarios_id' => 1, 'locaciones_id' => 2, 'academia_tarifas_id' => 4, 'activo' => 1, 'created_at' => date('Y-m-d')),
            array('academia_horarios_id' => 2, 'locaciones_id' => 1, 'academia_tarifas_id' => 1, 'activo' => 1, 'created_at' => date('Y-m-d')),
            array('academia_horarios_id' => 2, 'locaciones_id' => 1, 'academia_tarifas_id' => 2, 'activo' => 1, 'created_at' => date('Y-m-d')),
            array('academia_horarios_id' => 2, 'locaciones_id' => 1, 'academia_tarifas_id' => 3, 'activo' => 1, 'created_at' => date('Y-m-d')),
            array('academia_horarios_id' => 2, 'locaciones_id' => 1, 'academia_tarifas_id' => 4, 'activo' => 1, 'created_at' => date('Y-m-d')),
            array('academia_horarios_id' => 2, 'locaciones_id' => 2, 'academia_tarifas_id' => 1, 'activo' => 1, 'created_at' => date('Y-m-d')),
            array('academia_horarios_id' => 2, 'locaciones_id' => 2, 'academia_tarifas_id' => 2, 'activo' => 1, 'created_at' => date('Y-m-d')),
            array('academia_horarios_id' => 2, 'locaciones_id' => 2, 'academia_tarifas_id' => 3, 'activo' => 1, 'created_at' => date('Y-m-d')),
            array('academia_horarios_id' => 2, 'locaciones_id' => 2, 'academia_tarifas_id' => 4, 'activo' => 1, 'created_at' => date('Y-m-d')),

        );

        foreach (array_chunk($array_records, 100) as $records) {
        	\DB::table('academia_horarios_disponibles')->insert($records);
        }
    }
}
