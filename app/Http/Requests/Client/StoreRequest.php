<?php

namespace App\Http\Requests\Client;

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
            'name'=>'string|required|max:255',
            'cc'=>'integer|nullable|', 
            'rut'=>'string|nullable|unique:clients', 
            'address'=>'nullable|string|max:255', 
            'phone'=>'string|nullable',
            'email'=>'string|nullable|unique:clients,email,dns',
        ];
    }

    public function messages()
    {
        return[
            'name.required'=>'este campo es requerido.',
            'name.string'=>'el valor ingresado no es correcto.', 
            'name.max'=>'se permite maximo 50 caracteres.', 

            'cc.integer'=>'el valor ingresado no es correcto.', 
            
            'cc.unique'=>'la cedula ya esta registrada',
            
            'rut.string'=>'el valor ingresado no es correcto.', 
            
            'rut.unique'=>'este RUT ya esta registrado',

           
            'address.string'=>'el valor ingresado no es correcto.', 
            'address.max'=>'se permite maximo 255 caracteres.',

            'phone.string'=>'el valor ingresado no es correcto.', 
            'phone.max'=>'se permite maximo 10 caracteres.',
            'phone.min'=>'se permite minim 10 caracteres.',
            'phone.unique'=>'el telefono ya esta registrado',

            'email.string'=>'el valor ingresado no es correcto.', 
            'email.max'=>'se permite maximo 255 caracteres.',
            'email.unique'=>'el email ya esta registrado',
            'email.email'=>'este no es un correo electronico valido',

            
           
            
        ];
    }
}
