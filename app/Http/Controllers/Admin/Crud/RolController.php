<?php

namespace App\Http\Controllers\Admin\Crud;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//validation request
use App\Http\Requests\Admin\CreateRolRequest;
use App\Http\Requests\Admin\UpdateRolRequest;

//Helpers
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;

//models
use App\User;
use App\Models\sys\Profile;
use App\Models\sys\Rol;
use App\Models\sys\SelectOpt;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rols = Rol::OrderBy('id','DESC')
            ->with('User')
            ->with('Profile')
            ->get();

        return view('admin.rols.index', compact('rols'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $user_list = User::select('users.*')
                ->orderby('users.username','asc')
                ->pluck('username', 'id');
                // ->prepend('Seleccionar','');

        //lista para los roles
        $rol_list = SelectOpt::select('select_opts.*')
            ->where('table','rols')
            ->where('view','rol.create')
            ->where('name','rol')
            ->orderby('value')
            ->pluck('value','value');
            // ->prepend('Seleccionar','');

        //lista para los rangos
        $rango_list = SelectOpt::select('select_opts.*')
            ->where('table','rols')
            ->where('view','rol.create')
            ->where('name','rango')
            ->orderby('value')
            ->pluck('value','value');
            // ->prepend('Seleccionar','');

        // dd($user_list,$rol_list,$rango_list);

        return view('admin.rols.create',compact('user_list','rol_list','rango_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRolRequest $request)
    {

        $rol = Rol::create($request->all());

        $messenge = trans('db_oper_result.create_ok');

        Session::flash('operp_ok',$messenge);

        Session::flash('class_oper','success');

        return redirect()->route('rols.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rol = Rol::findOrFail($id);

        // $user = User::Where('id',$rol->user_id)->first();

        // $profile = Profile::Where('user_id',$rol->user_id)->first();

        // dd($profile);

        return view('admin.rols.show',compact('rol'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $rol = Rol::findOrFail($id);

        $user = User::findOrFail($rol->user_id);

        $profile = Profile::findOrFail($rol->user_id);

        // dd($rol,$user,$profile);

        //lista para los roles
        $rol_list = SelectOpt::select('select_opts.*')
            ->where('table','rols')
            ->where('view','rol.create')
            ->where('name','rol')
            ->orderby('value')
            ->pluck('value','value');
            // ->prepend('Seleccionar','');

        //lista para los rangos
        $rango_list = SelectOpt::select('select_opts.*')
            ->where('table','rols')
            ->where('view','rol.create')
            ->where('name','rango')
            ->orderby('value')
            ->pluck('value','value');
            // ->prepend('Seleccionar','');

        return view('admin.rols.edit',compact('rol','user','profile','user_list','rol_list','rango_list'));

        // return view('admin.rols.edit',compact('profile','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRolRequest $request, $id)
    {
        $rol = Rol::findOrFail($id);

        $rol->fill($request->all());

        $rol->save();

        $messenge = trans('db_oper_result.update_ok');

        Session::flash('operp_ok',$messenge);

        Session::flash('class_oper','success');

        return redirect()->route('rols.edit',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        //echo $id;exit;

        $rol = Rol::findOrFail($id);

        $rol->delete();

        $messenge = trans('db_oper_result.delete_ok');
        $operation= 'delete';

        if($request->ajax()){

            return response()->json([
                "messenge"=>$messenge,
                "operation"=>$operation,
            ]);

        }

        Session::flash('operp_ok',$messenge);

        return redirect()->route('rol.index');
    }
}
