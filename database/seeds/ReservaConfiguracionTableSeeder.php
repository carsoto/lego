<?php

use Illuminate\Database\Seeder;

class ReservaConfiguracionTableSeeder extends Seeder
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
			array('propiedad' => 'Tarifa por hora', 'valor' => '5', 'created_at' => date('Y-m-d')),
			array('propiedad' => 'Cantidad de personas por tarifa', 'valor' => '4', 'created_at' => date('Y-m-d')),
			array('propiedad' => 'Cantidad de canchas', 'valor' => '3', 'created_at' => date('Y-m-d')),
			array('propiedad' => 'Hora inicio', 'valor' => '8', 'created_at' => date('Y-m-d')),
			array('propiedad' => 'Hora fin', 'valor' => '21', 'created_at' => date('Y-m-d')),
            array('propiedad' => 'Locaciones', 'valor' => '1,2', 'created_at' => date('Y-m-d')),
        );

        foreach (array_chunk($array_records, 100) as $records) {
              \DB::table('reserva_configuracion')->insert($records);
        }
    }
}


