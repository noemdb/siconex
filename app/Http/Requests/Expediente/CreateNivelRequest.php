<?php

namespace App\Http\Requests\Expediente;

use Illuminate\Foundation\Http\FormRequest;

class CreateNivelRequest extends FormRequest
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
            'almacen_id' => 'required',
            'codigo' => 'required',
            'descripcion' => 'required|min:3|max:255',
        ];
    }

    public function messages()
    {
        return [
            'almacen_id.required' => trans('validation.form.request.almacen_id'),
            'codigo.required' => trans('validation.form.request.codigo'),
            'descripcion.required' => trans('validation.form.request.descripcion'),
            'descripcion.max' => trans('validation.form.request.descripcionmax'),
            'descripcion.min' => trans('validation.form.request.descripcionmin'),
        ];
    }
}
