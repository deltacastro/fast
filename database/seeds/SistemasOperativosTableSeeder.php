<?php

use App\Sistema_Operativo;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SistemasOperativosTableSeeder extends Seeder
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
            ['nombre' => 'Windows', 'descripcion' => 'La famosa ventana', 'created_at' => $date, 'updated_at' => $date],
            ['nombre' => 'Ubuntu', 'descripcion' => 'La confiable de linux', 'created_at' => $date, 'updated_at' => $date],
            ['nombre' => 'Debian', 'descripcion' => 'Para amantes de lo complicado', 'created_at' => $date, 'updated_at' => $date],
            ['nombre' => 'Mac OS', 'descripcion' => 'La preferida de los fresas', 'created_at' => $date, 'updated_at' => $date],
            ['nombre' => 'Android', 'descripcion' => 'Para los chingones', 'created_at' => $date, 'updated_at' => $date],
            ['nombre' => 'iOS', 'descripcion' => 'Para los que creen que mas caro es mejor', 'created_at' => $date, 'updated_at' => $date],
        ];

        $model =  new Sistema_Operativo;
        $saved = $model->insertOrIgnore($data);
        $this->command->comment("Se crearon $saved registros para la tabla {$model->getTable()}");
    }
}
