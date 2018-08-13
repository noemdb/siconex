<?php

namespace App\Http\Requests\Expediente;

use Illuminate\Foundation\Http\FormRequest;

class CreateExpedienteRequest extends FormRequest
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
            'user_id' => 'required',
            'codigo' => 'required|unique:expedientes,codigo',
            'descripcion' => 'required',
        ];
    }

    public function messages()
    {
        return [
            // 'estudiante_id.required' => 'El estudiante :attribute es obligatorio',
            'user_id.required' => trans('validation.form.request.user_id'),
            'estudiante_id.required' => trans('validation.form.request.estudiante_id'),
            'codigo.required' => trans('validation.form.request.codigo'),
            'descripcion.required' => trans('validation.form.request.descripcion'),
        ];
    }
}
