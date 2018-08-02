<?php

namespace App\Http\Middleware\Expediente;

use Closure;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Session;

class IsExpediente
{

    public function __construct(Guard $auth){

        $this->auth = $auth;

    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!$this->auth->user()->IsExpediente()){
            
            Session::flash('operp_ok',trans('db_oper_result.you_not_are_expediente'));

            return redirect('/home');
        }

        return $next($request);
    }
}
