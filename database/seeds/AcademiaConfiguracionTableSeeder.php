<?php

use Illuminate\Database\Seeder;

class AcademiaConfiguracionTableSeeder extends Seeder
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
			array('configuracion' => 'Locaciones', 'valor' => '1,2', 'created_at' => date('Y-m-d')),
			array('configuracion' => 'Duración de la clase', 'valor' => '90', 'created_at' => date('Y-m-d')),
        );

        foreach (array_chunk($array_records, 100) as $records) {
        	\DB::table('academia_configuracion')->insert($records);
        }
    }
}
