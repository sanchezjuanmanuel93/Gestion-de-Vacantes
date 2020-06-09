<?php
  
namespace App\Rules;
  
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;
  
class ContrasenaEsValida implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $contrasena
     * @return bool
     */
    public function passes($attribute, $contrasena)
    {
        return Hash::check($contrasena, auth()->user()->password);
    }
   
    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'La contraseña actual ingresada es incorrecta';
    }
}