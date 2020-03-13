<?php

use App\Departamento;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DepartamentosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = new Carbon();
        $data = [
            ['nombre' => 'TI','descripcion' => 'Soluciones en tecnologías de la información', 'created_at' => $date, 'updated_at' => $date, 'deleted_at' => null],
            ['nombre' => 'Diseño','descripcion' => 'Area de diseño', 'created_at' => $date, 'updated_at' => $date, 'deleted_at' => null],
            ['nombre' => 'Redes Sociales','descripcion' => 'Area de Redes Sociales', 'created_at' => $date, 'updated_at' => $date, 'deleted_at' => null],
            ['nombre' => 'Producción','descripcion' => 'Hacen videitos', 'created_at' => $date, 'updated_at' => $date, 'deleted_at' => null],
            ['nombre' => 'Creativos','descripcion' => 'Juegan con plastilina', 'created_at' => $date, 'updated_at' => $date, 'deleted_at' => null]
        ];

        $model =  new Departamento;
        $saved = $model->insertOrIgnore($data);
        $this->command->comment("Se crearon $saved registros para la tabla departamentos");
    }
}
