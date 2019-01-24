<?php

use Illuminate\Database\Seeder;

class VacacionalTableSeeder extends Seeder
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
			array('locaciones_id' => 2, 'fecha_inicio' => '2019-02-11', 'fecha_fin' => '2019-03-13', 'fecha_limite' => '2019-01-28', 'edad_inicio' => 6, 'edad_fin' => 14, 'porcentaje_individual' => 10, 'porcentaje_grupal' => 15, 'activo' => 1, 'created_at' => date('Y-m-d')),
            array('locaciones_id' => 1, 'fecha_inicio' => '2019-02-11', 'fecha_fin' => '2019-03-13', 'fecha_limite' => '2019-01-28', 'edad_inicio' => 6, 'edad_fin' => 14, 'porcentaje_individual' => 10, 'porcentaje_grupal' => 15, 'activo' => 1, 'created_at' => date('Y-m-d')),
        );

        foreach (array_chunk($array_records, 100) as $records) {
              \DB::table('vacacional')->insert($records);
        }
    }
}
