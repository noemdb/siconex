<?php

namespace App\Http\Controllers\Expediente\Chart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// Helpers
use Illuminate\Support\Carbon;
use Jenssegers\Date\Date;
use Illuminate\Support\Facades\DB;

// Modelos adicionadas
use App\Models\expedientes\Area;
use App\Models\expedientes\Movimiento;

class AreasController extends Controller
{
    public function index()
    {
        return view('expediente.areas.charts');
    }

    public function AreasMonth(Request $request)
    {
        $range = ($request->input('range')!=null) ? $request->input('range') : 'Todos';

        if ($range=='Todos') {
            $finicial = Carbon::now()->SubYear(10);
            $ffinal = Carbon::now()->AddYear(10);
        }else{
            $finicial = Carbon::now()->subMonth($range);
            $ffinal = Carbon::now();
        }

        $month = Area::select(DB::raw('count(id) as value'),DB::raw('MONTH(created_at) as month'))
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

        for ($i=0; $i < count($labels) ; $i++) {
        	$colors[] = 'rgba('.rand(0,255).', '.rand(0,255).', '.rand(0,255).', 1)';
        }

        $ChartDataSQL = [
            'labels'=>$label_month,
            'datasets'=>[
                [
                    "label"=>"Registros",
                    "backgroundColor"=>$colors,
                    "borderColor"=>$colors,
                    "borderWidth"=>2,
                    "data"=>$values
                ]
            ]
        ];

        return json_encode($ChartDataSQL);
    }

    public function AreasMovs(Request $request)
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

        $dataSQL = Movimiento::select('areas.codigo', DB::raw('count(movimientos.id) as value'))
        	->join('areas','areas.id','=','movimientos.area_id')
            ->Where('areas.created_at', '>=', $finicial)
            ->Where('areas.created_at', '<=', $ffinal)
            ->groupby('areas.codigo')
            ->orderBy('areas.codigo', 'asc')
            ->get()
            ->take($limit);

        $labels = $dataSQL->pluck('codigo');
        $values = $dataSQL->pluck('value');

        for ($i=0; $i < count($labels) ; $i++) {
        	$colors[] = 'rgba('.rand(0,255).', '.rand(0,255).', '.rand(0,255).', 1)';
        }

        $ChartDataSQL = [
            'labels'=>$labels,
            'datasets'=>[
                [
                    "label"=>"Registros",
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
