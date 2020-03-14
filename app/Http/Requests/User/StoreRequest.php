<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => 'required|max:20|min:5|unique:users',
            'email' => 'required|string|email|max:50|unique:users',
            'password' => 'required|min:6|confirmed',
            'people.nombre' => 'required|max:200',
            'people.paterno' => 'required|max:200',
            'people.materno' => 'nullable|max:200',
            'empleado.fecha_ingreso' => 'required|date',
            'empleado.estadoCivil_id' => 'required|exists:estado_civil,id'
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'username' => 'Usuario',
            'correo' => 'Correo',
            'password' => 'Contraseña',
            'people.nombre' => 'Nombre',
            'people.paterno' => 'apellido Paterno',
            'people.materno' => 'apellido Materno',
            'empleado.fecha_ingreso' => 'Fecha de ingreso',
            'empleado.estadoCivil_id' => 'Estado civil'
        ];
    }
}
