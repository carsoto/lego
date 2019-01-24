<?php

use Illuminate\Database\Seeder;

class CampamentosFechasTableSeeder extends Seeder
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
			array('campamentos_horarios_id' => 1, 'fecha_inicio' => '2019-02-09', 'fecha_fin' => '2019-02-10','created_at' => date('Y-m-d')),
            array('campamentos_horarios_id' => 2, 'fecha_inicio' => '2019-02-09', 'fecha_fin' => '2019-02-10','created_at' => date('Y-m-d')),
            array('campamentos_horarios_id' => 2, 'fecha_inicio' => '2019-02-16', 'fecha_fin' => '2019-02-17','created_at' => date('Y-m-d')),
            array('campamentos_horarios_id' => 3, 'fecha_inicio' => '2019-02-09', 'fecha_fin' => '2019-02-10','created_at' => date('Y-m-d')),
            array('campamentos_horarios_id' => 3, 'fecha_inicio' => '2019-02-09', 'fecha_fin' => '2019-02-10','created_at' => date('Y-m-d')),
            array('campamentos_horarios_id' => 3, 'fecha_inicio' => '2019-02-23', 'fecha_fin' => '2019-02-24','created_at' => date('Y-m-d')),

            array('campamentos_horarios_id' => 4, 'fecha_inicio' => '2019-03-09', 'fecha_fin' => '2019-03-10','created_at' => date('Y-m-d')),
            array('campamentos_horarios_id' => 5, 'fecha_inicio' => '2019-03-09', 'fecha_fin' => '2019-03-10','created_at' => date('Y-m-d')),
            array('campamentos_horarios_id' => 5, 'fecha_inicio' => '2019-03-16', 'fecha_fin' => '2019-03-17','created_at' => date('Y-m-d')),
            array('campamentos_horarios_id' => 6, 'fecha_inicio' => '2019-03-09', 'fecha_fin' => '2019-03-10','created_at' => date('Y-m-d')),
            array('campamentos_horarios_id' => 6, 'fecha_inicio' => '2019-03-09', 'fecha_fin' => '2019-03-10','created_at' => date('Y-m-d')),
            array('campamentos_horarios_id' => 6, 'fecha_inicio' => '2019-03-23', 'fecha_fin' => '2019-03-24','created_at' => date('Y-m-d')),
        );

        foreach (array_chunk($array_records, 100) as $records) {
              \DB::table('campamentos_fechas')->insert($records);
        }
    }
}
