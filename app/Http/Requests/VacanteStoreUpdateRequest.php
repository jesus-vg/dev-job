<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VacanteStoreUpdateRequest extends FormRequest
{
    // doc
    // https://aprendible.com/series/laravel-desde-cero/lecciones/que-son-y-como-utilizar-form-requests/
    // https://laravel.com/docs/9.x/validation#creating-form-requests

    /**
     * Determine if the user is authorized to make this request.
     * Este metodo se ejecuta 1ro luego se ejecuta el metodo rules()
     * @return bool
     */
    public function authorize()
    {
        return true; // ej. Si el usuario esta autenticado y ha verificado su cuenta
        // false devuelve un error 403 (Forbidden)
    }

    /**
     * Obtener las reglas de validación que se aplican a la solicitud.
     * usando en store y update del controlador VacanteController.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'titulo'      => 'required|string|max:255',
            'descripcion' => 'required|string|min:50',
            'categoria'   => 'required|integer',
            'experiencia' => 'required|integer',
            'ubicacion'   => 'required|integer',
            'salario'     => 'required|integer',
            'imagen'      => 'required|json|min:25',
            'skills'      => 'required|string|min:5|max:255',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     * https://laravel.com/docs/9.x/validation#customizing-the-error-messages
     *
     * @return array
     */
    public function messages()
    {
        return [
            'imagen.required' => 'Seleccione una imagen',
            // Personalizamos el mensaje de error para cuando los caracteres sean menores a 25
            // se valida en caso de que se manipule el json ya que un valor esperado es (minimo 1 archivo):
            // "[
            //         "temp/1/vacantes/imagenes/xzicLDofoUJtaSZ2H9APwxI3ublCxWi46G6tGi9A.png",
            //         "temp/1/vacantes/imagenes/YVw0rxd1CqS0A16EiiEiBDYdoqBLJxa1aGB0NAu5.png"
            // ]"
            'imagen.min'      => 'Seleccione una imagen',
            'skills.min'      => 'Seleccione minimo 3 skills',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     * https://laravel.com/docs/9.x/validation#customizing-the-validation-attributes
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'skills' => 'conocimientos y habilidades',
        ];
    }
}
