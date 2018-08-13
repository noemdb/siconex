<?php

namespace App\Http\Requests\Expediente;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Route;
use Illuminate\Http\Request;

class UpdateExpedienteRequest extends FormRequest
{

    private $route;

    public function __construct(Route $route){

        $this->route = $route;

    }
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
            'codigo' => 'required|unique:expedientes,codigo,'.$this->route->parameter('expediente'),
            'descripcion' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => trans('validation.form.request.user_id'),
            'estudiante_id.required' => trans('validation.form.request.estudiante_id'),
            'codigo.required' => trans('validation.form.request.codigo'),
            'descripcion.required' => trans('validation.form.request.descripcion'),
        ];
    }
}
