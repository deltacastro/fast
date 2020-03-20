<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Equipo extends Model
{
    use SoftDeletes;
    protected $table = 'equipos';
    protected $fillable = [
        'tipo_id', 'responsable_id', 'nombre', 'observaciones'
    ];
}
