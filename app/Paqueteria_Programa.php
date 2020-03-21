<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Paqueteria_Programa extends Model
{
    use SoftDeletes;
    protected $table = 'paqueteria_programa';
    protected $fillable = [
        'paqueteria_id', 'programa_id'
    ];
}
