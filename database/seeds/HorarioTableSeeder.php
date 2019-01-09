<?php

use Illuminate\Database\Seeder;

class HorarioTableSeeder extends Seeder
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
			array('locaciones_id' => 1, 'desde' => 8, 'hasta' => 13, 'hora_inicio' => '17:00', 'hora_fin' => '18:30', 'created_at' => date('Y-m-d')),
			array('locaciones_id' => 1, 'desde' => 14, 'hasta' => 100, 'hora_inicio' => '18:30', 'hora_fin' => '20:00', 'created_at' => date('Y-m-d')),
			array('locaciones_id' => 2, 'desde' => 8, 'hasta' => 13, 'hora_inicio' => '17:00', 'hora_fin' => '18:30', 'created_at' => date('Y-m-d')),
			array('locaciones_id' => 2, 'desde' => 14, 'hasta' => 100, 'hora_inicio' => '18:30', 'hora_fin' => '20:00', 'created_at' => date('Y-m-d')),
        );

        foreach (array_chunk($array_records, 100) as $records) {
              \DB::table('horario')->insert($records);
        }
    }
}
