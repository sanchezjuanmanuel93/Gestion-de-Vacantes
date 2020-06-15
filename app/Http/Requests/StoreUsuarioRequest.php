<?php

namespace App\Http\Requests;

use App\Rol;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StoreUsuarioRequest extends FormRequest
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
            'nombre' => 'required|max:45',
            'apellido' => 'required|max:100',
            'telefono' => 'required|max:45',
            'email' => 'required|unique:App\User,email',
            'rol' => ['required'], //Rule::in(Rol::select('id')->get())
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'La materia es requerida',
            'apellido.required' => 'La materia es requerida',
        ];
    }
}
