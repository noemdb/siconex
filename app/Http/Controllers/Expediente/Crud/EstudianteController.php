<?php

namespace App\Http\Controllers\Expediente\Crud;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//validation request
// use App\Http\Requests\Expediente\CreateEstudianteRequest;
// use App\Http\Requests\Expediente\UpdateEstudianteRequest;

//Helpers
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;

//models
use App\Models\expedientes\Estudiante;
use App\Models\expedientes\Estado;
use App\Models\sys\SelectOpt;

class EstudianteController extends Controller
{

    /*
        Constructor, verifica login del usuario - Profile
    */
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
        $estudiantes = Estudiante::OrderBy('estudiantes.id','DESC')
            ->with('estados')
            // ->with('expedientes')
            ->get();

        // dd($estudiantes);

        return view('expediente.estudiantes.index', compact('estudiantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
