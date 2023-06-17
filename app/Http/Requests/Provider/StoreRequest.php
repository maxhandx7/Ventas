<?php

namespace App\Http\Requests\Provider;

use Illuminate\Foundation\Http\FormRequest;

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

    public function rules()
    {
        return [
            'name' => 'required|unique:providers,name',
            'email' => 'nullable|email',
            'nit_number' => 'nullable',
            'address' => 'nullable',
            'phone' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return[
            'name.required' => 'El campo nombre es obligatorio.',
            'name.unique' => 'El nombre ya está en uso.',
            'email.email' => 'El campo email debe ser una dirección de correo electrónico válida.',
            'phone.string' => 'El campo teléfono debe ser un número entero.',
            
        ];
    }   
}
