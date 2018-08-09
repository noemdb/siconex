<?php

namespace App\Http\Requests\Expediente;

use Illuminate\Foundation\Http\FormRequest;

class CreateMovimientoRequest extends FormRequest
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
            'user_id' => 'required',
            'nivel_id' => 'required',
            'descripcion' => 'required|min:3|max:255',
            // 'observacion' => 'required|min:3|max:255',
        ];
    }

    public function messages()
    {
        return [
            'expediente_id.required' => trans('validation.form.request.expediente_id'),
            'nivel_id.required' => trans('validation.form.request.nivel_id'),
            'descripcion.required' => trans('validation.form.request.descripcion'),
            'descripcion.max' => trans('validation.form.request.descripcionmax'),
            'descripcion.min' => trans('validation.form.request.descripcionmin'),
        ];
    }
}
