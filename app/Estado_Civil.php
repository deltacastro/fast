<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado_Civil extends Model
{
    protected $table = 'estado_civil';
    protected $fillable = ['nombre'];
}
