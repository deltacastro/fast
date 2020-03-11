<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
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
            'username' => [
                'required',
                'max:20',
                'min:5',
                Rule::unique('users', 'username')->ignore($this->route('user'))
            ],
            'email' => [
                'required',
                'string',
                'email',
                'max:50',
                Rule::unique('users', 'email')->ignore($this->route('user'))
            ],
            'password' => 'nullable|string|min:6|confirmed'
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
            'password' => 'Contraseña'
        ];
    }
}
