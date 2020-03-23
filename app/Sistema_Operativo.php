<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sistema_Operativo extends Model
{
    use SoftDeletes;
    protected $table = 'sistemas_operativos';
    protected $fillable = [
        'nombre', 'descripcion'
    ];

    public function versiones()
    {
        return $this->morphMany(Version::class, 'versionable');
    }
}
