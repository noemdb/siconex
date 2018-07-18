<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Route;
use Illuminate\Http\Request;

class UpdateUserRequest extends FormRequest
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

        // dd($request);

        $request = Request::All();
        
        $rule_pass = (! empty($request['password'])) ? 'required|min:6' : '' ;

        return [
            'username' => 'required|max:255|unique:users,username,'.$this->route->parameter('user'),
            'password' => $rule_pass,
            'email' => 'required|unique:users,email|email',
            'email' => 'required|max:255|unique:users,email,'.$this->route->parameter('user'),
            'is_active' => 'required',
        ];
    }
}
