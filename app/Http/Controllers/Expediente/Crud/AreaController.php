<?php

namespace App\Http\Controllers\Expediente\Crud;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//validation request
use App\Http\Requests\Expediente\CreateAreaRequest;
use App\Http\Requests\Expediente\UpdateAreaRequest;
//Helpers
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
//models
use App\User;
use App\Models\expedientes\Area;
use App\Models\expedientes\Movimiento;
use App\Models\expedientes\Expediente;
use App\Models\expedientes\Almacen;
use App\Models\sys\SelectOpt;

class AreaController extends Controller
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
        $areas = Area::OrderBy('areas.id','DESC')->get();

        return view('expediente.areas.index', compact('areas'));
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
                ->pluck('nombre', 'id')
                ->prepend('Seleccione Almacen','');

        return view('expediente.areas.create',compact('almacens'));
    }

    public function CreateWithid($almacen_id)
    {
        $almacens = Almacen::Select('almacens.id','almacens.nombre')
                ->where('id',$almacen_id)
                ->orderby('nombre','asc')
                // ->first();
                ->pluck('nombre', 'id');
                // ->prepend('Seleccione Almacen','');

        $area = new Area;
        $area->codigo = Carbon::now()->format('mYs').$almacens[$almacen_id];

        return view('expediente.areas.create',compact('almacens','area'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAreaRequest $request)
    {
        $area = Area::create($request->all());

        $messenge = trans('db_oper_result.create_ok');

        Session::flash('operp_ok',$messenge);

        Session::flash('class_oper','success');

        return redirect()->route('areas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $area = Area::findOrFail($id);

        return view('expediente.areas.show',compact('area'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $area = Area::findOrFail($id);
        $almacens = Almacen::select('nombre', 'id')
                ->where('id',$area->almacen_id)
                ->orderby('id','asc')
                ->pluck('nombre', 'id');
                // ->prepend('Seleccione Almacen','');
        return view('expediente.areas.edit',compact('area','almacens'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAreaRequest $request, $id)
    {
        $area = Area::findOrFail($id);

        $area->fill($request->all());

        $area->save();

        $messenge = trans('db_oper_result.update_ok');

        Session::flash('operp_ok',$messenge);

        Session::flash('class_oper','success');

        return redirect()->route('areas.edit',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $area = Area::findOrFail($id);
        $area->delete();

        $messenge = trans('db_oper_result.delete_ok');
        $operation= 'delete';

        if($request->ajax()){
            return response()->json([
                "messenge"=>$messenge,
                "operation"=>$operation,
            ]);
        }

        Session::flash('operp_ok',$messenge);

        return redirect()->route('areas.index');
    }
}
