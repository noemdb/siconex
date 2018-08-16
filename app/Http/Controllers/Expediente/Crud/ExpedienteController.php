<?php

namespace App\Http\Controllers\Expediente\Crud;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//validation request
use App\Http\Requests\Expediente\CreateExpedienteRequest;
use App\Http\Requests\Expediente\UpdateExpedienteRequest;

//Helpers
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;

//models
use App\Models\expedientes\Expediente;
use App\Models\expedientes\Estudiante;
use App\Models\sys\SelectOpt;


class ExpedienteController extends Controller
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
        $expedientes = Expediente::OrderBy('id','DESC')->get();

        return view('expediente.expedientes.index', compact('expedientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estudiantes = Estudiante::select('estudiantes.*')
                ->leftJoin('expedientes', 'estudiantes.id', '=', 'expedientes.estudiante_id')
                // ->whereNull('expedientes.estudiante_id')
                ->orderby('estudiantes.ci','asc')
                ->pluck('ci', 'id');

        return view('expediente.expedientes.create',compact('estudiantes'));
    }

    // Funcion para crear registro cuando se envia el id
    public function CreateWithid($estudiante_id)
    {
        $estudiantes = Estudiante::Select('id','ci')
                ->where('id',$estudiante_id)
                ->orderby('ci','asc')
                // ->first();
                ->pluck('ci', 'id');
                // ->prepend('Seleccione Almacen','');

        $expediente = new Expediente;
        $expediente->codigo = Carbon::now()->format('mYs').$estudiantes[$estudiante_id];

        return view('expediente.expedientes.create',compact('estudiantes','estudiante_id','expediente'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateExpedienteRequest $request)
    {

        $expediente = Expediente::create($request->all());

        $messenge = trans('db_oper_result.create_ok');

        Session::flash('operp_ok',$messenge);

        Session::flash('class_oper','success');

        return redirect()->route('expedientes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $expediente = Expediente::findOrFail($id);

        return view('expediente.expedientes.show',compact('expediente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $expediente = Expediente::findOrFail($id);

        $estudiantes = Estudiante::where('id',$expediente->estudiante_id )
                ->pluck('ci', 'id');

        return view('expediente.expedientes.edit',compact('expediente','estudiantes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExpedienteRequest $request, $id)
    {
        $expediente = Expediente::findOrFail($id);

        $expediente->fill($request->all());

        $expediente->save();

        $messenge = trans('db_oper_result.update_ok');

        Session::flash('operp_ok',$messenge);

        Session::flash('class_oper','success');

        return redirect()->route('expedientes.edit',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $expediente = Expediente::findOrFail($id);

        $expediente->delete();

        $messenge = trans('db_oper_result.delete_ok');
        $operation= 'delete';

        if($request->ajax()){
            return response()->json([
                "messenge"=>$messenge,
                "operation"=>$operation,
            ]);
        }

        Session::flash('operp_ok',$messenge.' -> ('.$expediente->codigo.')');

        return redirect()->route('expedientes.index');
    }
}
