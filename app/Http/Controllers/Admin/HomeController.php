<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\common\Task;
use App\Models\common\Alert;
// use App\Models\common\Messege;

use App\User;
use App\Models\sys\Profile;
use App\Models\sys\Rol;

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

        // $messeges = Messege::OrderBy('created_at', 'desc')
                    //->where('destino_user_id',\Auth::user()->id)
                    // ->get();

        $users = User::OrderBy('created_at', 'desc')
                    //->where('destino_user_id',\Auth::user()->id)
                    ->get();

        $profiles = Profile::OrderBy('created_at', 'desc')
                    //->where('destino_user_id',\Auth::user()->id)
                    ->get();

        $rols = Rol::OrderBy('created_at', 'desc')
                    //->where('destino_user_id',\Auth::user()->id)
                    ->get();

        // dd($tasks,$alerts,$messeges,$users,$profiles,$rols);

        return view('admin.home',compact('tasks','alerts','users','profiles','rols'));
    }
}
