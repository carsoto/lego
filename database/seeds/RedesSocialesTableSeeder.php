<?php

use Illuminate\Database\Seeder;

class RedesSocialesTableSeeder extends Seeder
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
        	array('descripcion' => 'Instagram', 'icono' => 'fa-instagram', 'activo' => 1, 'created_at' => date('Y-m-d')),
        	array('descripcion' => 'Facebook', 'icono' => 'fa-facebook', 'activo' => 1, 'created_at' => date('Y-m-d')),
        	array('descripcion' => 'Twitter', 'icono' => 'fa-twitter', 'activo' => 1, 'created_at' => date('Y-m-d')),
        );

        foreach (array_chunk($array_records, 100) as $records) {
              \DB::table('redes_sociales')->insert($records);
        }
    }
}
