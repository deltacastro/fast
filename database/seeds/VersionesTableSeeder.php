<?php

use App\Sistema_Operativo;
use App\Version;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class VersionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = new Carbon;
        $model = new Sistema_Operativo;
        $data = [];
        $model = $model->all();
        foreach ($model as $row) {
            $data['sistemas_operativos'][strtolower($row->nombre)] = [
                'type' => $row->getTable(),
                'id' => $row->id,
            ];
        }

        $soVersions = [
            // WINDOWS
            ['versionable_type' => $data['sistemas_operativos']['windows']['type'], 'versionable_id' => $data['sistemas_operativos']['windows']['id'], 'nombre' => '10'],
            ['versionable_type' => $data['sistemas_operativos']['windows']['type'], 'versionable_id' => $data['sistemas_operativos']['windows']['id'], 'nombre' => '8.1'],
            ['versionable_type' => $data['sistemas_operativos']['windows']['type'], 'versionable_id' => $data['sistemas_operativos']['windows']['id'], 'nombre' => '7'],
            // UBUNTU
            ['versionable_type' => $data['sistemas_operativos']['ubuntu']['type'], 'versionable_id' => $data['sistemas_operativos']['ubuntu']['id'], 'nombre' => '18.04 TS'],
            ['versionable_type' => $data['sistemas_operativos']['ubuntu']['type'], 'versionable_id' => $data['sistemas_operativos']['ubuntu']['id'], 'nombre' => '16.04 TS'],
            // DEBIAN
            ['versionable_type' => $data['sistemas_operativos']['debian']['type'], 'versionable_id' => $data['sistemas_operativos']['debian']['id'], 'nombre' => '7'],
            // MACOS
            ['versionable_type' => $data['sistemas_operativos']['mac os']['type'], 'versionable_id' => $data['sistemas_operativos']['mac os']['id'], 'nombre' => '10.12: Sierra (Fuji)'],
            ['versionable_type' => $data['sistemas_operativos']['mac os']['type'], 'versionable_id' => $data['sistemas_operativos']['mac os']['id'], 'nombre' => '10.13: High Sierra (Lobo)'],
            ['versionable_type' => $data['sistemas_operativos']['mac os']['type'], 'versionable_id' => $data['sistemas_operativos']['mac os']['id'], 'nombre' => '10.14: Mojave (Liberty)'],
            ['versionable_type' => $data['sistemas_operativos']['mac os']['type'], 'versionable_id' => $data['sistemas_operativos']['mac os']['id'], 'nombre' => '10.15: Catalina (Jazz)'],
            // ANDROID
            ['versionable_type' => $data['sistemas_operativos']['android']['type'], 'versionable_id' => $data['sistemas_operativos']['android']['id'], 'nombre' => '8: Oreo'],
            ['versionable_type' => $data['sistemas_operativos']['android']['type'], 'versionable_id' => $data['sistemas_operativos']['android']['id'], 'nombre' => '9: Pie'],
            ['versionable_type' => $data['sistemas_operativos']['android']['type'], 'versionable_id' => $data['sistemas_operativos']['android']['id'], 'nombre' => '10: Android 10'],
            // IOS
            ['versionable_type' => $data['sistemas_operativos']['ios']['type'], 'versionable_id' => $data['sistemas_operativos']['ios']['id'], 'nombre' => '8'],
            ['versionable_type' => $data['sistemas_operativos']['ios']['type'], 'versionable_id' => $data['sistemas_operativos']['ios']['id'], 'nombre' => '9'],
            ['versionable_type' => $data['sistemas_operativos']['ios']['type'], 'versionable_id' => $data['sistemas_operativos']['ios']['id'], 'nombre' => '12'],
        ];

        // dd($soVersions);

        $model =  new Version;
        $saved = 0;
        foreach ($soVersions as $so) {
            $sModel = $model->firstOrNew($so);
            $saved += $sModel->created_at === null ? 1 : 0;
            $sModel->save();
        }
        $this->command->comment("Se crearon $saved registros para la tabla {$model->getTable()}");
    }
}
