<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Paqueteria extends Model
{
    use SoftDeletes;
    protected $table = 'paqueterias';
    protected $fillable = [
        'nombre', 'descripcion'
    ];
}
