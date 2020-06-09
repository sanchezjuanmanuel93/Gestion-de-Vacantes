<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVacanteRequest extends FormRequest
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
            'id-materia' => 'required',
            'fecha-apertura' => 'required',
            'fecha-cierre' => 'required',
            'nombre-puesto' => 'required|max:45',
            'descripcion-puesto' => 'required|max:500'
        ];
    }

    public function messages()
    {
        return [
            'id-materia.required' => 'La materia es requerida',
            'fecha-apertura.required' => 'La fecha de apertura es requerida',
            'fecha-cierre.required' => 'La fecha de cierre es requerida',
            'nombre-puesto.required' => 'El nombre del puesto es requerido',
            'descripcion-puesto.required' => 'La descripcion del puesto es requerida',
            'nombre-puesto.max' => "El nombre del puesto no debe contener mas de 45 caracteres",
            'descripcion-puesto.max' => "La descripcion es demasiada larga"
        ];
    }
}
