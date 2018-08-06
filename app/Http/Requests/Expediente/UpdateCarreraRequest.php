<?php

namespace App\Http\Requests\Expediente;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCarreraRequest extends FormRequest
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
            'estudiante_id' => 'required',
            'nombre' => 'required|min:3|max:255',
            'padminsion' => 'required|min:1|max:2',
            'fingreso' => 'required|date',
            // 'fegreso' => 'date',
            // 'fcongelar' => 'date',
            // 'fdescongelar' => 'date',
        ];
    }
}
