<?php

use App\Tipo_Equipo;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TiposEquiposTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = new Carbon;
        $data = [
            ['nombre' => 'Computadora de escritorio', 'descripcion' => 'Computadora estacionaria', 'created_at' => $date, 'updated_at' => $date],
            ['nombre' => 'Computadora portatil', 'descripcion' => 'Computadora portable', 'created_at' => $date, 'updated_at' => $date],
            ['nombre' => 'Servidor', 'descripcion' => 'Equipo para administrar servicios y peticiones en red', 'created_at' => $date, 'updated_at' => $date],
            ['nombre' => 'Smartphone', 'descripcion' => 'Teléfono inteligente', 'created_at' => $date, 'updated_at' => $date],
            ['nombre' => 'Tableta', 'descripcion' => 'Dispositivo Movil de mayor tamaño', 'created_at' => $date, 'updated_at' => $date],
        ];

        $model =  new Tipo_Equipo;
        $saved = $model->insertOrIgnore($data);
        $this->command->comment("Se crearon $saved registros para la tabla {$model->getTable()}");
    }
}
