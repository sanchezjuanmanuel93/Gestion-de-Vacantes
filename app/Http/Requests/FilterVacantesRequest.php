<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilterVacantesRequest extends FormRequest
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
            "fecha_inicio" => "Fecha Inicio",
            "fecha_fin" => "Fecha Fin",
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
            "searchBy" => "nullable",
            "fecha_apertura" => "nullable",
            "fecha_cierre_estipulada" => "nullable",
            "fecha_cierre" => "nullable",
            "fecha_cierre_merito" => "nullable",
            "fecha_inicio" => "required_with:searchBy",
            "fecha_fin" => "required_with:searchBy",
        ];
    }

    public function messages()
    {
        return [
            'fecha_inicio.required_with' => 'La Fecha Inicio es requerida',
            'fecha_fin.required_with' => 'La Fecha Fin es requerida',
        ];
    }
}
