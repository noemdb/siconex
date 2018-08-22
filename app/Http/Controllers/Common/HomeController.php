<?php

namespace App\Http\Controllers\Common;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\common\Task;
use App\Models\common\Alert;
use App\Models\common\Messege;

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

        $messeges = Messege::OrderBy('created_at', 'desc')
                    //->where('destino_user_id',\Auth::user()->id)
                    ->get();

        dd($tasks,$alerts,$messeges);

        return view('common.home',compact('tasks','alerts','messeges'));
    }
}
