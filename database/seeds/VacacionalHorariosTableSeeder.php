<?php

use Illuminate\Database\Seeder;

class VacacionalHorariosTableSeeder extends Seeder
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
			array('vacacional_id' => 1, 'hora_inicio' => '08:30', 'hora_fin' => '10:30', 'tarifa_ins' => 90, 'activo' => 1, 'created_at' => date('Y-m-d')),
			array('vacacional_id' => 1, 'hora_inicio' => '10:30', 'hora_fin' => '12:30', 'tarifa_ins' => 90, 'activo' => 1, 'created_at' => date('Y-m-d')),
			array('vacacional_id' => 1, 'hora_inicio' => '08:30', 'hora_fin' => '12:30', 'tarifa_ins' => 150, 'activo' => 1, 'created_at' => date('Y-m-d')),

            array('vacacional_id' => 2, 'hora_inicio' => '08:30', 'hora_fin' => '10:30', 'tarifa_ins' => 90, 'activo' => 1, 'created_at' => date('Y-m-d')),
            array('vacacional_id' => 2, 'hora_inicio' => '10:30', 'hora_fin' => '12:30', 'tarifa_ins' => 90, 'activo' => 1, 'created_at' => date('Y-m-d')),
            array('vacacional_id' => 2, 'hora_inicio' => '08:30', 'hora_fin' => '12:30', 'tarifa_ins' => 150, 'activo' => 1, 'created_at' => date('Y-m-d')),
        );

        foreach (array_chunk($array_records, 100) as $records) {
              \DB::table('vacacional_horarios')->insert($records);
        }
    }
}
