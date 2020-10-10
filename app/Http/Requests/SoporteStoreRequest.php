<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SoporteStoreRequest extends FormRequest
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
            'consulta' => 'required|min:10|max:200' 
        ];
    }

    public function messages()
    {
        return [
            'consulta.required' => 'Ingrese su consulta',
            'consulta.min' => 'El campo no puede ser menor a diez caracteres',
            'consulta.max' => 'El campo no puede exceder los 200 caracteres'
        ];
    }
}
