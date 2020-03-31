<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tipo_Equipo extends Model
{
    use SoftDeletes;
    protected $table = 'tipos_equipos';
    protected $fillable = [
        'nombre', 'descripcion'
    ];
}
