<?php

namespace App\Http\Controllers\Expediente\Crud;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//validation request
use App\Http\Requests\Expediente\CreateDocumentoRequest;
use App\Http\Requests\Expediente\UpdateDocumentoRequest;
//Helpers
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
//models
use App\Models\expedientes\Documento;
use App\Models\expedientes\Expediente;
use App\Models\sys\SelectOpt;

class DocumentoController extends Controller
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
        $documentos = Documento::OrderBy('documentos.id','DESC')->get();

        return view('expediente.documentos.index', compact('documentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos = SelectOpt::select('select_opts.*')
                    ->where('table','documentos')
                    ->where('view','documentos.create')
                    ->where('name','tipo')
                    ->pluck('key', 'value');

        $expedientes = Expediente::select('expedientes.*')
                ->orderby('expedientes.id','asc')
                ->pluck('codigo', 'id');
                // ->prepend('Seleccionar','');

        return view('expediente.documentos.create',compact('tipos','expedientes'));
    }
    
    // Funcion para crear registro cuando se envia el id
    public function CreateWithExpId($expediente_id)
    {
        $tipos = SelectOpt::select('select_opts.*')
                    ->where('table','documentos')
                    ->where('view','documentos.create')
                    ->where('name','tipo')
                    ->pluck('key', 'value');

        $expedientes = Expediente::select('expedientes.*')
                ->where('id',$expediente_id)
                ->orderby('expedientes.id','asc')
                ->pluck('codigo', 'id');
                // ->prepend('Seleccionar','');

        return view('expediente.documentos.create',compact('tipos','expedientes','expediente_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateDocumentoRequest $request)
    {
        $documento = Documento::create($request->all());

        $messenge = trans('db_oper_result.create_ok');

        Session::flash('operp_ok',$messenge);

        Session::flash('class_oper','success');

        return redirect()->route('documentos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $documento = Documento::findOrFail($id);

        return view('expediente.documentos.show',compact('documento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $documento = Documento::findOrFail($id);

        $tipos = SelectOpt::select('select_opts.*')
                    ->where('table','documentos')
                    ->where('view','documentos.create')
                    ->where('name','tipo')
                    ->pluck('key', 'value');

        $expedientes = Expediente::select('expedientes.*')
                ->orderby('expedientes.id','asc')
                ->pluck('codigo', 'id');
                // ->prepend('Seleccionar','');

        $documento = Documento::findOrFail($id);

        return view('expediente.documentos.edit',compact('documento','tipos','expedientes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDocumentoRequest $request, $id)
    {
        $documento = Documento::findOrFail($id);

        $documento->fill($request->all());

        $documento->save();

        $messenge = trans('db_oper_result.update_ok');

        Session::flash('operp_ok',$messenge);

        Session::flash('class_oper','success');

        return redirect()->route('documentos.edit',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $documento = Documento::findOrFail($id);
        $documento->delete();

        $messenge = trans('db_oper_result.delete_ok');
        $operation= 'delete';

        if($request->ajax()){
            return response()->json([
                "messenge"=>$messenge,
                "operation"=>$operation,
            ]);
        }

        Session::flash('operp_ok',$messenge);

        return redirect()->route('documentos.index');
    }
}
