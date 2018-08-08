<?php

namespace App\Http\Controllers\Expediente\Chart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// Helpers
use Illuminate\Support\Carbon;
use Jenssegers\Date\Date;
use Illuminate\Support\Facades\DB;

// Modelos adicionadas
use App\Models\expedientes\Documento;
use App\Models\expedientes\Estudiante;

class DocumentosController extends Controller
{
    public function index()
    {
        return view('expediente.documentos.charts');
    }

    public function DocumentosMonth(Request $request)
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

        $month = Documento::select(DB::raw('count(id) as value'),DB::raw('MONTH(created_at) as month'))
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
                    "label"=>"Documentos",
                    "backgroundColor"=>"rgba(50, 200, 43,0.2)",
                    "borderColor"=>"rgba(50, 200, 43,1)",
                    "borderWidth"=>2,
                    "data"=>$values
                ]
            ]
        ];

        return json_encode($ChartDataSQL);
    }

    public function DocumentosTypes(Request $request)
    {

        $range = ($request->input('range')!=null) ? $request->input('range') : 'Todos';
        $limit = ($request->input('limit')!=null) ? $request->input('limit') : 8;

        if($range=='Todos'){
            $fecha = Carbon::now()->subyear(100);
        }else{
            $fecha = Carbon::now()->subDays($range);
        }

        $tipos = Documento::select('tipo', DB::raw('count(tipo) as value'))
        	->Where('created_at', '>=', $fecha)
            ->groupby('tipo')
            ->orderBy('tipo', 'asc')
            ->get()
            ->take($limit);

        $labels = $tipos->pluck('tipo');
        $values = $tipos->pluck('value');

        for ($i=0; $i < count($labels) ; $i++) {
        	$colors[] = 'rgba('.rand(0,255).', '.rand(0,255).', '.rand(0,255).', 1)';
        }

        unset($ChartDataSQL);
        $ChartDataSQL = [
            'labels'=>$labels,
            'datasets'=>[
                [
                    "label"=>"Tipos",
                    "backgroundColor"=>$colors,
                    "borderColor"=>$colors,
                    "borderWidth"=>2,
                    "data"=>$values
                ]
            ]
        ];

        return json_encode($ChartDataSQL);
    }

}
