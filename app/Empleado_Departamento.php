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


    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */

    protected $with = ['departamento', 'cargo'];

    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'departamento_id');
    }

    public function cargo()
    {
        return $this->belongsTo(Cargo::class, 'cargo_id');
    }
}
