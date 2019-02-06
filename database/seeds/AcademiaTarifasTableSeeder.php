<?php

use Illuminate\Database\Seeder;

class AcademiaTarifasTableSeeder extends Seeder
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
			array('frecuencia' => '1 vez', 'edad_inicio' => NULL, 'edad_fin' => NULL, 'cant_clases' => 1, 'tarifa_individual' => '12.00', 'tarifa_dupla' => '20.00', 'activo' => 1, 'created_at' => date('Y-m-d')),
			array('frecuencia' => '2 veces', 'edad_inicio' => NULL, 'edad_fin' => NULL, 'cant_clases' => 8, 'tarifa_individual' => '75.00', 'tarifa_dupla' => '100.00', 'activo' => 1, 'created_at' => date('Y-m-d')),
			array('frecuencia' => '3 veces', 'edad_inicio' => NULL, 'edad_fin' => NULL, 'cant_clases' => 12, 'tarifa_individual' => '100.00', 'tarifa_dupla' => '150.00', 'activo' => 1, 'created_at' => date('Y-m-d')),
			array('frecuencia' => '4 veces', 'edad_inicio' => NULL, 'edad_fin' => NULL, 'cant_clases' => 16, 'tarifa_individual' => '125.00', 'tarifa_dupla' => '200.00', 'activo' => 1, 'created_at' => date('Y-m-d')),
        );

        foreach (array_chunk($array_records, 100) as $records) {
        	\DB::table('academia_tarifas')->insert($records);
        }
    }
}
