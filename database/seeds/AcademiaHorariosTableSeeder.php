<?php

use Illuminate\Database\Seeder;

class AcademiaHorariosTableSeeder extends Seeder
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
			array('edad_inicio' => 6, 'edad_fin' => 15, 'hora_inicio' => '17:00', 'hora_fin' => '18:30', 'activo' => 1, 'created_at' => date('Y-m-d')),
			array('edad_inicio' => 16, 'edad_fin' => 100, 'hora_inicio' => '18:30', 'hora_fin' => '20:00', 'activo' => 1, 'created_at' => date('Y-m-d')),
        );

        foreach (array_chunk($array_records, 100) as $records) {
              \DB::table('academia_horarios')->insert($records);
        }
    }
}
