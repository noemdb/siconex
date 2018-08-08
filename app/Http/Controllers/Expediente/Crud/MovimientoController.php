<?php

namespace App\Http\Controllers\Expediente\Crud;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//validation request
use App\Http\Requests\Expediente\CreateMovimientoRequest;
use App\Http\Requests\Expediente\UpdateMovimientoRequest;
//Helpers
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
//models
use App\Models\expedientes\Movimiento;
use App\Models\expedientes\Expediente;
use App\Models\expedientes\Almacen;
use App\Models\expedientes\Nivel;
use App\Models\sys\SelectOpt;

use App\User;
use App\Models\sys\Rol;

class MovimientoController extends Controller
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
        $movimientos = Movimiento::OrderBy('movimientos.id','DESC')->get();

        return view('expediente.movimientos.index', compact('movimientos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $expedientes = Expediente::select('expedientes.*')
                ->orderby('expedientes.id','asc')
                ->pluck('codigo', 'id');

        $almacens = Almacen::select('nombre', 'id')
                ->orderby('id','asc')
                ->pluck('nombre', 'id');

        $nivels = Nivel::select('codigo', 'id')
                ->orderby('id','asc')
                ->pluck('codigo', 'id');
                // ->prepend('Seleccionar','');

        // dd($options);

        return view('expediente.movimientos.create',compact('almacens','nivels','expedientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateMovimientoRequest $request)
    {
        $movimiento = Movimiento::create($request->all());

        $messenge = trans('db_oper_result.create_ok');

        Session::flash('operp_ok',$messenge);

        Session::flash('class_oper','success');

        return redirect()->route('movimientos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
