<?php

namespace App\Http\Requests\Expediente;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDocumentoRequest extends FormRequest
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
            'expediente_id' => 'required',
            'tipo' => 'required|min:3|max:255',
            'descripcion' => 'required|min:3|max:255',
            // 'observacion' => 'required|min:3|max:255',
            'original' => 'required|min:2|max:2',
            'copia' => 'required|min:2|max:2',
        ];
    }
}
