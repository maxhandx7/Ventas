<?php

namespace App\Http\Requests\Category;

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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required|string|max:50', 
            'description'=>'nullable|string|max:250'
        ];
    }
    public function messages()
    {
        return[
            'name.required'=>'este campo es requerido.',
            'name.string'=>'el valor ingresado no es correcto.', 
            'name.max'=>'se permite maximo 50 caracteres.',  
            'description.string'=>'el valor ingresado no es correcto.', 
            'description.max'=>'se permite maximo 250 caracteres.', 
            
        ];
    }
}
