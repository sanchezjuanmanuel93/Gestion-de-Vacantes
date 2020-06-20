<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostulacionStoreRequest extends FormRequest
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
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'cv' => 'Curriculum Vitae',
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
            'id_vacante' => 'required',
            'cv' => 'required|file||max:2048' //mimes:pdf,doc,dox
        ];
    }

    public function messages()
    {
        return [
            'cv.required' => 'CV REQUERIDO',
        ];
    }
}
