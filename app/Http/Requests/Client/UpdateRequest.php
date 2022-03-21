<?php

namespace App\Http\Requests\Client;

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
            'name'=>'string|required|max:255',
            'cc'=>'string|required|unique:clients,cc,'. $this->route('client')->id.'', 
            'rut'=>'string|nullable|unique:clients,rut,'. $this->route('client')->id.'', 
            'address'=>'nullable|string|max:255', 
            'phone'=>'string|nullable|unique:clients,phone,'. $this->route('client')->id.'',
            'email'=>'string|nullable|unique:clients,email,'. $this->route('client')->id.'|max:255|email:rfc,dns',
        ];
        
    }

     public function messages()
    {
        return[
            'name.required'=>'este campo es requerido.',
            'name.string'=>'el valor ingresado no es correcto.', 
            'name.max'=>'se permite maximo 50 caracteres.', 

            'cc.required'=>'este campo es requerido.',
            'cc.string'=>'el valor ingresado no es correcto.', 
            'cc.max'=>'se permite maximo 10 caracteres.',
            'cc.min'=>'se permite maximo 10 caracteres.',
            'cc.unique'=>'la cedula ya esta registrada',
            
            'rut.string'=>'el valor ingresado no es correcto.', 
            'rut.max'=>'se permite maximo 15 caracteres.',
            'rut.min'=>'se permite minim 15 caracteres.',
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
            'email.email'=>'este Rno es un correo electronico valido',

            
           
            
        ];
    }
}
