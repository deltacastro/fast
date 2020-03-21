<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Version extends Model
{
    use SoftDeletes;
    protected $table = 'versiones';
    protected $fillable = [
        'versionable_type', 'versionable_id', 'nombre', 'release_date'
    ];
}