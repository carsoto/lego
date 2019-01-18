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
			array('created_at' => date('Y-m-d'))
        );

        foreach (array_chunk($array_records, 100) as $records) {
              \DB::table('campamentos_fechas')->insert($records);
        }
    }
}
