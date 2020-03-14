<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable, HasRoles, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'people_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($value) {
        $this->attributes['password'] = Hash::make($value);
    }

    private function buildDataFillable ($data) {
        $dataFillable = array();
        foreach ($this->fillable as $value) {
            $dataFillable[$value] = isset($data[$value]) ? $data[$value] : null;
            if ($dataFillable[$value] == null) {
                unset($dataFillable[$value]);
            }
        }
        return $dataFillable;
    }

    public function guardar($data) {
        $data = $this->buildDataFillable($data);
        $data = $this->create($data);
        return $data;
    }

    public function actualizar($data, $model) {
        $data = $this->buildDataFillable($data);
        $data = $model->fill($data)->save();
        return $data ? $this->find($model->id) : false;
    }

    public function scopeBuscar($query, $param) {
        if ($param != null) {
            $query->where(function($query2) use ($param) {
                    $query2->orwhere('username', 'like', "%$param%")
                        ->orwhere('email', 'like', "%$param%")
                        ->orwhere('created_at', 'like', "%$param%");
                });
        }

        return $query;
    }

    public function puedeGuardarUsuario()
    {
        return $this->can('store user');
    }
}
