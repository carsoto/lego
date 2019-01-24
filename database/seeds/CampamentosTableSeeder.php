<?php

use Illuminate\Database\Seeder;

class CampamentosTableSeeder extends Seeder
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
            array('locaciones_id' => 3, 'descripcion' => 'Campamento para adolescentes', 'edad_inicio' => 16, 'edad_fin' => null, 'porcentaje_individual' => 10, 'porcentaje_grupal' => null, 'fecha_limite' => '2019-01-26', 'activo' => 1, 'created_at' => date('Y-m-d')),
            array('locaciones_id' => 3, 'descripcion' => 'Campamento para niños', 'edad_inicio' => 12, 'edad_fin' => 15, 'porcentaje_individual' => 10, 'porcentaje_grupal' => null, 'fecha_limite' => '2019-02-23', 'activo' => 1, 'created_at' => date('Y-m-d')),

        );

        foreach (array_chunk($array_records, 100) as $records) {
              \DB::table('campamentos')->insert($records);
        }
    }
}
