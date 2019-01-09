<?php

use Illuminate\Database\Seeder;

class LocacionesSeeder extends Seeder
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
        	array('ubicacion' => 'Vía a la costa', 'direccion' => 'LACOSTA PADEL', 'activo' => 1, 'created_at' => date('Y-m-d')),
        	array('ubicacion' => 'Samborondón', 'direccion' => 'CLUB BIBLOS', 'activo' => 1, 'created_at' => date('Y-m-d')),
        );

        foreach (array_chunk($array_records, 100) as $records) {
              \DB::table('locaciones')->insert($records);
        }
    }
}
