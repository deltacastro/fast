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
        $this->call(DepartamentosTableSeeder::class);
        $this->call(CargosTableSeeder::class);
        $this->call(EstadoCivilTableSeeder::class);
        $this->call(TiposEquiposTableSeeder::class);
        $this->call(SistemasOperativosTableSeeder::class);
        $this->call(ProgramasTableSeeder::class);
        $this->call(VersionesTableSeeder::class);
    }
}
