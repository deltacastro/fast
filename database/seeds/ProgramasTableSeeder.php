<?php

use App\Programa;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ProgramasTableSeeder extends Seeder
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
            ['nombre' => 'Word', 'descripcion' => 'Hoja de texto enriquecido', 'created_at' => $date, 'updated_at' => $date],
            ['nombre' => 'Excel', 'descripcion' => 'Hoja de calculo', 'created_at' => $date, 'updated_at' => $date],
            ['nombre' => 'Power Point', 'descripcion' => 'Hoja de presentación', 'created_at' => $date, 'updated_at' => $date],
            ['nombre' => 'VirtualBox', 'descripcion' => 'Virtualizador de arquitecturas', 'created_at' => $date, 'updated_at' => $date],
            ['nombre' => 'Premiere', 'descripcion' => 'Premiere', 'created_at' => $date, 'updated_at' => $date],
            ['nombre' => 'Photoshop', 'descripcion' => 'Para Photochopear', 'created_at' => $date, 'updated_at' => $date],
        ];

        $model =  new Programa;
        $saved = $model->insertOrIgnore($data);
        $this->command->comment("Se crearon $saved registros para la tabla {$model->getTable()}");
    }
}
