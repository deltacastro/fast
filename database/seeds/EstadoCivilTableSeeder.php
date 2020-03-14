<?php

use App\Estado_Civil;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class EstadoCivilTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Matrimonio y filiación. Soltero/a. Casado/a. Viudo/a. Divorciado/a.
        $date = new Carbon;
        $data = [
            ['nombre' => 'Soltero/a', 'created_at' => $date, 'updated_at' => $date],
            ['nombre' => 'Casado/a', 'created_at' => $date, 'updated_at' => $date],
            ['nombre' => 'Viudo/a', 'created_at' => $date, 'updated_at' => $date],
            ['nombre' => 'Divorciado/a', 'created_at' => $date, 'updated_at' => $date]
        ];

        $model =  new Estado_Civil;
        $saved = $model->insertOrIgnore($data);
        $this->command->comment("Se crearon $saved registros para la tabla estado_civil");
    }
}
