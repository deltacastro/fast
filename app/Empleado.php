<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empleado extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'people_id', 'fecha_ingreso', 'estadoCivil_id'
    ];

    protected $dates = [
        'fecha_ingreso'
    ];

    private function buildDataFillable ($data) {
        $dataFillable = array();
        foreach ($this->fillable as $value) {
            $dataFillable[$value] = isset($data[$value]) ? $data[$value] : null;
            if ($dataFillable[$value] == null) {
                unset($dataFillable[$value]);
            }
        }
        return $dataFillable;
    }

    public function guardar($data) {
        $data = $this->buildDataFillable($data);
        $data = $this->create($data);
        return $data;
    }

    public function actualizar($data, $model) {
        $data = $this->buildDataFillable($data);
        $data = $model->fill($data)->save();
        return $data ? $this->find($model->id) : false;
    }
}
