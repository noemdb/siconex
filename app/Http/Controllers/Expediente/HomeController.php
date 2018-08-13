<?php

namespace App\Http\Controllers\Expediente;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Models\sys\Task;
use App\Models\sys\Alert;
use App\Models\expedientes\Movimiento;
use App\Models\expedientes\Expediente;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::OrderBy('created_at', 'desc')
                    //->where('destino_user_id',\Auth::user()->id)
                    ->get();

        $alerts = Alert::OrderBy('created_at', 'desc')
                    //->where('destino_user_id',\Auth::user()->id)
                    ->get();

        $movimientos = Movimiento::OrderBy('created_at', 'desc')
                    //->where('destino_user_id',\Auth::user()->id)
                    ->get();

        $expedientes = Expediente::OrderBy('created_at', 'desc')
                    //->where('destino_user_id',\Auth::user()->id)
                    ->get();

        return view('expediente.home',compact('tasks','alerts','movimientos','expedientes'));
    }
}
