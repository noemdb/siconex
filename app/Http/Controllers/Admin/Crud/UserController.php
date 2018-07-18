<?php

namespace App\Http\Controllers\Admin\Crud;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//validation request
use App\Http\Requests\Admin\CreateUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;

//Helpers
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;

//models
use App\User;
use App\Models\sys\Profile;
use App\Models\sys\Rol;
use App\Models\sys\SelectOpt;

class UserController extends Controller
{

    /*
        Constructor, verifica login del usuario - Profile
    */
    public function __construct(){

        $this->middleware(['auth','is_admin']);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::OrderBy('users.id','DESC')
            // ->withTrashed()
            // ->username($arr_get)
            ->with('profile')
            ->with('rols')
            ->get();

        return view('admin.users.index', compact('users','is_active_list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $is_active_list = SelectOpt::select('select_opts.*')
        ->where('table','users')
        ->where('name','is_active')
        ->where('view','rol.index')
        ->orderby('value')
        ->pluck('value','value');
        // ->prepend('Estado','');

        return view('admin.users.create', compact('is_active_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {

        $user = User::create($request->all());
        
        Session::flash('operp_ok','Registro guardado exitasamente');

        return redirect()->route('users.create');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $user = User::findOrFail($id);

        $profile = Profile::Where('user_id',$user->id)->first();

        $rols = Rol::Where('user_id',$user->id)->get();

        return view('admin.users.show',compact('user','profile','rols'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        $profile = Profile::Where('user_id',$user->id)->first();

        $rols = Rol::Where('user_id',$user->id)->get();

        $is_active_list = SelectOpt::select('select_opts.*')
            ->where('table','users')
            ->where('name','is_active')
            ->where('view','rol.index')
            ->orderby('value')
            ->pluck('value','value');
            // ->prepend('Seleccionar','');

        return view('admin.users.edit',compact('user','profile','rols','is_active_list'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        
        $user = User::findOrFail($id);
        
        $user->fill($request->all());

        $user->save();

        $messenge = trans('db_oper_result.user_update_ok');

        Session::flash('operp_ok',$messenge);

        Session::flash('class_oper','success');
        
        return redirect()->route('users.edit',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $user = User::findOrFail($id);

        $user->profile()->delete();        
        $user->rols()->delete();
        $user->delete();
        $messenge = trans('db_oper_result.delete_ok');
        $operation= 'delete';

        if($request->ajax()){

            return response()->json([
                "messenge"=>$messenge,
                "operation"=>$operation,
            ]);

        }
        
        Session::flash('operp_ok',$messenge.' -> ('.$user->username.')');

        return redirect()->route('users.index');
    }
}
