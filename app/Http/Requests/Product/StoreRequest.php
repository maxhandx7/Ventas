<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

   
    public function rules()
    {
        
            return [

                'name'=>'string|required|unique:products|max:255',
                'sell_price'=>'required',
               

        ]; 
      
    }
public function messages()
    {
        return[
            'name.string'=>'El valor ingresado no es correcto.', 
            'name.required'=>'Este campo es requerido.',
            'name.unique'=>'El producto ya esta registrado', 
            'name.max'=>'Se permite maximo 255 caracteres.', 
            
            

            'sell_price.required'=>'Este campo es requerido.',
 
            
            
        ];
    }

}
