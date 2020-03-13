<?php

use App\Cargo;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CargosTableSeeder extends Seeder
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
            ['nombre' => 'Desarrollador','descripcion' => 'Tira puro código', 'created_at' => $date, 'updated_at' => $date, 'deleted_at' => null],
            ['nombre' => 'Community manager','descripcion' => 'Redes sociales', 'created_at' => $date, 'updated_at' => $date, 'deleted_at' => null],
            ['nombre' => 'Editor video','descripcion' => 'Edita videos', 'created_at' => $date, 'updated_at' => $date, 'deleted_at' => null],
            ['nombre' => 'Editor audio','descripcion' => 'Edita audio', 'created_at' => $date, 'updated_at' => $date, 'deleted_at' => null],
            ['nombre' => 'Camarografo','descripcion' => 'Camaronea', 'created_at' => $date, 'updated_at' => $date, 'deleted_at' => null]
        ];

        $model =  new Cargo;
        $saved = $model->insertOrIgnore($data);
        $this->command->comment("Se crearon $saved registros para la tabla cargos");
    }
}
