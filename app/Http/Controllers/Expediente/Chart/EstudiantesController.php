<?php

namespace App\Http\Controllers\Expediente\Chart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Helpers
use Illuminate\Support\Carbon;
use Jenssegers\Date\Date;
use Illuminate\Support\Facades\DB;

// Modelos adicionadas
use App\Models\expedientes\Estudiante;
// use App\Models\expedientes\Expediente;
// use App\Models\expedientes\Carrera;
// use App\Models\expedientes\Estado;

class EstudiantesController extends Controller
{
    public function index()
    {        
        return view('expediente.estudiantes.charts');
    }

    public function EstudianteMonth(Request $request)
    {

        $range = ($request->input('range')!=null) ? $request->input('range') : 'Todos';


        if ($range=='Todos') {
            $finicial = Carbon::now()->SubYear(10);
            $ffinal = Carbon::now()->AddYear(10);
        }else{
            $finicial = Carbon::now()->subMonth($range);
            $ffinal = Carbon::now();
        }

        // $range = Carbon::now()->subMonth($months);

        $month = Estudiante::select(DB::raw('count(id) as value'),DB::raw('MONTH(created_at) as month'))
            ->Where('created_at', '>=', $finicial)
            ->Where('created_at', '<=', $ffinal)
            ->groupby('month')
            ->orderBy('month', 'asc')
            ->get();

        //dd($usersmonth);

        //INI nombre de los meses en español
        $labels = $month->pluck('month');
        foreach ($labels as $key => $value) {
            $dateObj   = Date::createFromFormat('!m', $value);
            $label_month[] = ucfirst($dateObj->format('F'));
        }
        $values = $month->pluck('value');
        //FIN nombre de los meses en español

        $ChartDataSQL = [
            'labels'=>$label_month,
            'datasets'=>[
                [
                    "label"=>"Usuarios Registrados",
                    "backgroundColor"=>"rgba(192, 57, 43,0.2)",
                    "borderColor"=>"rgba(192, 57, 43,1)",
                    "borderWidth"=>2,
                    "data"=>$values
                ]
            ]
        ];

        return json_encode($ChartDataSQL);
    }

    public function EstudianteEstado(Request $request)
    {

        $range = ($request->input('range')!=null) ? $request->input('range') : 'Todos';
        $limit = ($request->input('limit')!=null) ? $request->input('limit') : 8;

        if($range=='Todos'){
            $finicial = Carbon::now()->SubYear(1000);
            $ffinal = Carbon::now()->AddYear(1000);
        }else{
            $finicial = Carbon::now()->subMonth($range);
            $ffinal = Carbon::now();
        }       

        $estados = Estudiante::select('estados.estado as estado', DB::raw('count(estados.estado) as value'))
        	->join('estados', 'estudiantes.id', '=', 'estados.estudiante_id')
            ->Where('estados.created_at', '>=', $finicial)
            ->Where('estados.created_at', '<=', $ffinal)
            ->groupby('estados.estado')
            ->orderBy('estados.estado', 'asc')
            ->get()
            ->take($limit);

        //dd($estados);//to-do corregir, los estados contabilizado deben ser uno por usuario (el mas reciente)

        $labels = $estados->pluck('estado');
        $values = $estados->pluck('value');

        for ($i=0; $i < count($labels) ; $i++) { 
        	$colors[] = 'rgba('.rand(0,255).', '.rand(0,255).', '.rand(0,255).', 1)';
        }
        unset($ChartDataSQL);
        //tipo pie
        $ChartDataSQL = [
            'labels'=>$labels,
            'datasets'=>[
                [
                    "label"=>"Estudiantes por Estado",
                    "backgroundColor"=>$colors,
                    "borderColor"=>"rgba(0, 0, 0,0.2)",
                    "data"=>$values
                ]
            ]
        ];

        return json_encode($ChartDataSQL);
    }
}
