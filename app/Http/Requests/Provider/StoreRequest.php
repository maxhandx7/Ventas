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
            'name'=>'required|string|max:255', 
            'email'=>'required|email|string|max:200|unique:providers', 
            'nit_number'=>'required|string|unique:providers', 
            'address'=>'nullable|string|max:255', 
            'phone'=>'required|string|unique:providers',
        ];
    }

    public function messages()
    {
        return[
            'name.required'=>'Este campo es requerido.',
            'name.string'=>'El valor no es correcto .',
            'name.max'=>'Solo se permiten 255 caracteres.',

            'email.required'=>'Este campo es requerido.',
            'email.email'=>'No es un correo electronico.',
            'email.string'=>'El valor no es correcto.',
            'email.max'=>'Solo se permiten 255 caracteres.',
            'email.unique'=>'Ya se encuentra registrado.',

            'nit_number.required'=>'Este campo es requerido.',
            'nit_number.string'=>'El valor no es correcto.',
           
            'nit_number.unique'=>'Ya se encuentra registrado.',

            'address.max'=>'Solo se permiten 255 caracteres.',
            'address.string'=>'El valor no es correcto.',

            'phone.required'=>'Este campo es requerido.',
            'phone.string'=>'El valor no es correcto.',
              
            'phone.unique'=>'Ya se encuentra registrado.',
            
        ];
    }   
}
