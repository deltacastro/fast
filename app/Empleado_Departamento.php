<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empleado_Departamento extends Model
{
    use SoftDeletes;

    protected $table = 'empleados_has_departamentos';
    protected $fillable = [
        'empleado_id', 'cargo_id', 'departamento_id'
    ];
}
