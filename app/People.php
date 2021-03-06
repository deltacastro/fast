<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class People extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nombre', 'paterno', 'materno'
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

    public function actualizar($data) {
        $data = $this->buildDataFillable($data);
        $data = $this->fill($data)->save();
        return $data ? $this->find($this->id) : false;
    }

    public function nombreCompleto()
    {
        return "$this->nombre $this->paterno $this->materno";
    }

    public function empleado()
    {
        return $this->hasOne(Empleado::class, 'people_id');
    }
}
