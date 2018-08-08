<?php

namespace App\Http\Controllers\Expediente\Crud;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//validation request
use App\Http\Requests\Expediente\CreateEstadoRequest;
use App\Http\Requests\Expediente\UpdateEstadoRequest;
//Helpers
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
//models
use App\Models\expedientes\Estado;
use App\Models\expedientes\Estudiante;
use App\Models\sys\SelectOpt;

class EstadoController extends Controller
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
        $estados = Estado::OrderBy('estados.created_at','DESC')->get();

        return view('expediente.estados.index', compact('estados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estados = SelectOpt::select('select_opts.*')
                    ->where('table','estados')
                    ->where('view','estados.create')
                    ->where('name','estado')
                    ->pluck('key', 'value');

        $estudiantes = Estudiante::select('estudiantes.*')
                ->orderby('estudiantes.ci','asc')
                ->pluck('ci', 'id');
                // ->prepend('Seleccionar','');

        return view('expediente.estados.create',compact('estados','estudiantes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateEstadoRequest $request)
    {
        $estado = Estado::create($request->all());

        $messenge = trans('db_oper_result.create_ok');

        Session::flash('operp_ok',$messenge);

        Session::flash('class_oper','success');

        return redirect()->route('estados.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estado = Estado::findOrFail($id);

        return view('expediente.estados.show',compact('estado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estado = Estado::findOrFail($id);

        $estados = SelectOpt::select('select_opts.*')
                    ->where('table','estados')
                    ->where('view','estados.create')
                    ->where('name','estado')
                    ->pluck('key', 'value');

        $estudiantes = Estudiante::select('estudiantes.*')
                ->orderby('estudiantes.ci','asc')
                ->pluck('ci', 'id');

        return view('expediente.estados.edit',compact('estado','estados','estudiantes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEstadoRequest $request, $id)
    {
        $estado = Estado::findOrFail($id);

        $estado->fill($request->all());

        $estado->save();

        $messenge = trans('db_oper_result.update_ok');

        Session::flash('operp_ok',$messenge);

        Session::flash('class_oper','success');

        return redirect()->route('estados.edit',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $estado = Estado::findOrFail($id);
        $estado->delete();

        $messenge = trans('db_oper_result.delete_ok');
        $operation= 'delete';

        if($request->ajax()){
            return response()->json([
                "messenge"=>$messenge,
                "operation"=>$operation,
            ]);
        }

        Session::flash('operp_ok',$messenge);

        return redirect()->route('estados.index');
    }
}
