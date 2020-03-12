<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado_Departamento extends Model
{
    protected $table = 'empleados_has_departamentos';
    protected $fillable = [
        'empleado_id', 'cargo_id', 'departamento_id'
    ];
}
