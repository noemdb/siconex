<?php

namespace App\Http\Controllers\Expediente\Chart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Helpers
use Illuminate\Support\Carbon;
use Jenssegers\Date\Date;
use Illuminate\Support\Facades\DB;

// Modelos adicionadas
use App\Models\expedientes\Carrera;
use App\Models\expedientes\Estudiante;

class CarrerasController extends Controller
{
    public function index()
    {
        return view('expediente.carreras.charts');
    }

    public function CarrerasEstuds(Request $request)
    {
        $range = ($request->input('range')!=null) ? $request->input('range') : 'Todos';
        $limit = ($request->input('limit')!=null) ? $request->input('limit') : 8;

        if($range=='Todos'){
            $finicial = Carbon::now()->SubYear(10);
            $ffinal = Carbon::now()->AddYear(10);
        }else{
            $finicial = Carbon::now()->subMonth($range);
            $ffinal = Carbon::now();
        }

        $dataSQL = Carrera::select('carreras.nombre', DB::raw('count(estudiantes.id) as value'))
        	->join('estudiantes','estudiantes.id','=','carreras.estudiante_id')
            ->Where('carreras.created_at', '>=', $finicial)
            ->Where('carreras.created_at', '<=', $ffinal)
            ->groupby('carreras.nombre')
            ->orderBy('carreras.nombre', 'asc')
            ->get()
            ->take($limit);

        $labels = $dataSQL->pluck('nombre');
        $values = $dataSQL->pluck('value');

        for ($i=0; $i < count($labels) ; $i++) {
        	$colors[] = 'rgba('.rand(0,255).', '.rand(0,255).', '.rand(0,255).', 1)';
        }

        unset($ChartDataSQL);
        //tipo bar

        $ChartDataSQL = [
            'labels'=>$labels,
            'datasets'=>[
                [
                    "label"=>"Núm. Estudiantes",
                    "fill"=>false,
                    "backgroundColor"=>$colors,
                    // "backgroundColor"=>"rgba(192, 57, 43,0.2)",
                    "borderColor"=>$colors,
                    // "borderColor"=>"rgba(192, 57, 43,0.8)",
                    "borderWidth"=>2,
                    "data"=>$values,
                ]
            ]
        ];

        return json_encode($ChartDataSQL);
    }

}
