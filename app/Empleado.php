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
}
