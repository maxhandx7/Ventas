<?php

namespace App\Http\Requests\Provider;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }

   
    public function rules()
    {
        
             return [
            'name'=>'required|string|max:255', 
            'email'=>'nullable|email|string|max:200|unique:providers,email,'. $this->route('provider')->id. '|max:255',
            'nit_number'=>'nullable|string|max:11|unique:providers,nit_number,'. $this->route('provider')->id. '|max:11', 
            'address'=>'nullable|string|max:255', 
            'phone'=>'nullable|string',
        ]; 
        
    }

    public function messages()
    {
        return[
            'name.required'=>'Este campo es requerido.',
            'name.string'=>'El valor no es correcto .',
            'name.max'=>'Solo se permiten 255 caracteres.',

            'email.email'=>'No es un correo electronico.',
            'email.string'=>'El valor no es correcto.', 
            'email.max'=>'Solo se permiten 255 caracteres.',
            'email.unique'=>'Ya se encuentra registrado.',

            'nit_number.string'=>'El valor no es correcto.',
            'nit_number.max'=>'Solo se permiten 11 caracteres.',
            'nit_number.min'=>'Solo se permiten 11 caracteres.',    
            'nit_number.unique'=>'Ya se encuentra registrado.',

            'address.max'=>'Solo se permiten 255 caracteres.',
            'address.string'=>'El valor no es correcto.',

            'phone.string'=>'El valor no es correcto.',

            
        ];
    } 
}
