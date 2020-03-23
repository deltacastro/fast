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

    public function scopeBuscar($query, $param)
    {
        if ($param != null) {
            $query->where(function($query2) use ($param) {
                    $query2->orwhere('nombre', 'like', "%$param%")
                        ->orwhere('observaciones', 'like', "%$param%")
                        ->orwhere('created_at', 'like', "%$param%");
                });
        }
        return $query;
    }
}
