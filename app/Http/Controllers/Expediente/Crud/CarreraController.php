<?php

namespace App\Http\Controllers\Expediente\Crud;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//validation request
// use App\Http\Requests\Expediente\CreateCarreraRequest;
// use App\Http\Requests\Expediente\UpdateCarreraRequest;

//Helpers
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;

//models
use App\Models\expedientes\Carrera;
use App\Models\expedientes\Estudiante;
use App\Models\sys\SelectOpt;


class CarreraController extends Controller
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
        $carreras = Carrera::OrderBy('carreras.id','DESC')->get();

        return view('expediente.carreras.index', compact('carreras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $carreras = SelectOpt::select('select_opts.*')
                    ->where('table','carreras')
                    ->where('view','carreras.create')
                    ->where('name','nombre')
                    ->pluck('key', 'value');

        $estudiantes = Estudiante::select('estudiantes.*')
                ->orderby('estudiantes.ci','asc')
                ->pluck('ci', 'id');
                // ->prepend('Seleccionar','');

        return view('expediente.carreras.create',compact('carreras','estudiantes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
