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
use App\Models\expedientes\Area;
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

        $areas = Area::select('codigo', 'id')
                ->orderby('id','asc')
                ->pluck('codigo', 'id');
                // ->prepend('Seleccionar','');

        $tipos = SelectOpt::select('select_opts.*')
                    ->where('table','movimientos')
                    ->where('view','movimientos.create')
                    ->where('name','tipo')
                    ->pluck('key', 'value');

        // dd($options);

        return view('expediente.movimientos.create',compact('almacens','areas','expedientes','tipos'));
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
        $movimiento = Movimiento::findOrFail($id);

        return view('expediente.movimientos.show',compact('movimiento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movimiento = Movimiento::findOrFail($id);

        $expedientes = Expediente::select('expedientes.*')
                ->orderby('expedientes.id','asc')
                ->pluck('codigo', 'id');

        $almacens = Almacen::select('nombre', 'id')
                ->orderby('id','asc')
                ->pluck('nombre', 'id');

        $areas = Area::select('codigo', 'id')
                ->orderby('id','asc')
                ->pluck('codigo', 'id');
                // ->prepend('Seleccionar','');

        $tipos = SelectOpt::select('select_opts.*')
                    ->where('table','movimientos')
                    ->where('view','movimientos.create')
                    ->where('name','tipo')
                    ->pluck('key', 'value');

        return view('expediente.movimientos.edit',compact('movimiento','expedientes','almacens','areas','tipos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMovimientoRequest $request, $id)
    {
        $movimiento = Movimiento::findOrFail($id);

        $movimiento->fill($request->all());

        $movimiento->save();

        $messenge = trans('db_oper_result.update_ok');

        Session::flash('operp_ok',$messenge);

        Session::flash('class_oper','success');

        return redirect()->route('movimientos.edit',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $movimiento = Movimiento::findOrFail($id);
        $movimiento->delete();

        $messenge = trans('db_oper_result.delete_ok');
        $operation= 'delete';

        if($request->ajax()){
            return response()->json([
                "messenge"=>$messenge,
                "operation"=>$operation,
            ]);
        }

        Session::flash('operp_ok',$messenge);

        return redirect()->route('movimientos.index');
    }
}
