<?php

namespace App\Http\Requests\Expediente;

use Illuminate\Foundation\Http\FormRequest;

class CreateEstudianteRequest extends FormRequest
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
            'firstname' => 'required|min:3|max:255',
            'lastname' => 'required|min:3|max:255',
            'ci' => 'required|min:1000000|numeric',
            'email' => 'required|unique:estudiantes,email|email',
        ];
    }
}
