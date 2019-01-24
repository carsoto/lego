<?php

use Illuminate\Database\Seeder;

class CampamentosHorariosTableSeeder extends Seeder
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
			array('campamentos_id' => 1, 'descripcion' => '1 fin de semana', 'tarifa_ins' => 90, 'activo' => 1, 'created_at' => date('Y-m-d')),
			array('campamentos_id' => 1, 'descripcion' => '2 fines de semana', 'tarifa_ins' => 120, 'activo' => 1, 'created_at' => date('Y-m-d')),
			array('campamentos_id' => 1, 'descripcion' => '3 fines de semana', 'tarifa_ins' => 150, 'activo' => 1, 'created_at' => date('Y-m-d')),

			array('campamentos_id' => 2, 'descripcion' => '1 fin de semana', 'tarifa_ins' => 90, 'activo' => 1, 'created_at' => date('Y-m-d')),
			array('campamentos_id' => 2, 'descripcion' => '2 fines de semana', 'tarifa_ins' => 120, 'activo' => 1, 'created_at' => date('Y-m-d')),
			array('campamentos_id' => 2, 'descripcion' => '3 fines de semana', 'tarifa_ins' => 150, 'activo' => 1, 'created_at' => date('Y-m-d')),

        );

        foreach (array_chunk($array_records, 100) as $records) {
              \DB::table('campamentos_horarios')->insert($records);
        }
    }
}
