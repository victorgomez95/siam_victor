<?php

namespace SIAM\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class registerDocParticularRequest extends FormRequest
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
            'name'                  => 'required|max:50',
            'apellidos'             => 'required',
            'ubicacion'             => 'required',
            'cedula'                => 'required',
            'sexo'                  => 'required',
            'telefono'              => 'required|max:10',
            'email'                 => 'required|email|max:255|unique:users',
            'password'              => 'required|min:6|confirmed',
        ];
    }
}
