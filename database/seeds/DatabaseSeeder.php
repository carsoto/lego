<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        
        // La creación de datos de roles debe ejecutarse primero
	    $this->call(RoleTableSeeder::class);

	    // Los usuarios necesitarán los roles previamente generados
	    $this->call(UserTableSeeder::class);

        $this->call(InformacionAdicionalTableSeeder::class);

        $this->call(LocacionesTableSeeder::class);

        $this->call(ServiciosTableSeeder::class);
        
        $this->call(HorariosTableSeeder::class);

        $this->call(VacacionalTableSeeder::class);

        $this->call(VacacionalHorariosTableSeeder::class);

        $this->call(CampamentosTableSeeder::class);

        $this->call(CampamentosHorariosTableSeeder::class);
        
        $this->call(CampamentosFechasTableSeeder::class);

        $this->call(ReservaConfiguracionTableSeeder::class);

        $this->call(AcademiaConfiguracionTableSeeder::class);

        $this->call(AcademiaTarifasTableSeeder::class);

        $this->call(AcademiaHorariosTableSeeder::class);

        $this->call(AcademiaHorariosTarifasTableSeeder::class);
    }
}
