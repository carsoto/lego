<?php

use Illuminate\Database\Seeder;

class ServiciosTableSeeder extends Seeder
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
			array('descripcion' => 'Academia', 'activo' => 1, 'created_at' => date('Y-m-d')),
			array('descripcion' => 'Alquiler de canchas', 'activo' => 1, 'created_at' => date('Y-m-d')),
			array('descripcion' => 'Vacacional', 'activo' => 1, 'created_at' => date('Y-m-d')),
			array('descripcion' => 'Campamentos', 'activo' => 1, 'created_at' => date('Y-m-d')),
			array('descripcion' => 'Torneos', 'activo' => 1, 'created_at' => date('Y-m-d')),
        );

        foreach (array_chunk($array_records, 100) as $records) {
              \DB::table('servicios')->insert($records);
        }
    }
}
