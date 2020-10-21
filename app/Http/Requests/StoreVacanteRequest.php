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

    public function attributes()
    {
        return [
            'id-materia' => 'Materia',
            'fecha-apertura' => 'Fecha Apertura',
            'fecha-cierre' => 'Fecha Cierre Estipulada',
            'nombre-puesto' => 'Nombre del Puesto',
            'descripcion-puesto' => 'Descripcion del Puesto',
        ];
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
            'fecha-apertura' => 'required|date|after:yesterday',
            'fecha-cierre' => 'required|date|after_or_equal:fecha-apertura',
            'nombre-puesto' => 'required|max:45',
            'descripcion-puesto' => 'required|max:500'
        ];
    }

    public function messages()
    {
        return [
            'fecha-apertura.after' => 'El campo Fecha Apertura debe ser una fecha posterior a hoy.',
        ];
    }
}
