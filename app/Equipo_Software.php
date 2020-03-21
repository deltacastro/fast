<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Equipo_Software extends Model
{
    use SoftDeletes;
    protected $table = 'equipo_software';
    protected $fillable = [
        'installable_type', 'installable_id', 'expire_at'
    ];

    protected $dates = [
        'expire_at'
    ];
}
