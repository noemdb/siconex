<?php

namespace App\Http\Controllers\Expediente\Crud;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//validation request
use App\Http\Requests\Expediente\CreateNivelRequest;
use App\Http\Requests\Expediente\UpdateNivelRequest;
//Helpers
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
//models
use App\Models\expedientes\Nivel;
use App\Models\expedientes\Movimiento;
use App\Models\expedientes\Expediente;
use App\Models\expedientes\Almacen;
use App\Models\sys\SelectOpt;

use App\User;
use App\Models\sys\Rol;
class NivelController extends Controller
{
    /* Constructor, verifica login del usuario - agregar middleware para verificar el rol */
    public function __construct(){
        $this->middleware(['auth']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nivels = Nivel::OrderBy('nivels.id','DESC')->get();

        return view('expediente.nivels.index', compact('nivels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $almacens = Almacen::select('nombre', 'id')
                ->orderby('id','asc')
                ->pluck('nombre', 'id');

        return view('expediente.nivels.create',compact('almacens'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateNivelRequest $request)
    {
        $nivel = Nivel::create($request->all());

        $messenge = trans('db_oper_result.create_ok');

        Session::flash('operp_ok',$messenge);

        Session::flash('class_oper','success');

        return redirect()->route('nivels.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nivel = Nivel::findOrFail($id);

        return view('expediente.nivels.show',compact('nivel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nivel = Nivel::findOrFail($id);
        $almacens = Almacen::select('nombre', 'id')
                ->orderby('id','asc')
                ->pluck('nombre', 'id');
        return view('expediente.nivels.edit',compact('nivel','almacens'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNivelRequest $request, $id)
    {
        $nivel = Nivel::findOrFail($id);

        $nivel->fill($request->all());

        $nivel->save();

        $messenge = trans('db_oper_result.update_ok');

        Session::flash('operp_ok',$messenge);

        Session::flash('class_oper','success');

        return redirect()->route('nivels.edit',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $nivel = Nivel::findOrFail($id);
        $nivel->delete();

        $messenge = trans('db_oper_result.delete_ok');
        $operation= 'delete';

        if($request->ajax()){
            return response()->json([
                "messenge"=>$messenge,
                "operation"=>$operation,
            ]);
        }

        Session::flash('operp_ok',$messenge);

        return redirect()->route('nivels.index');
    }
}
