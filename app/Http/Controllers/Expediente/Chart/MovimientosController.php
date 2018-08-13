<?php

namespace App\Http\Controllers\Expediente\Chart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// Helpers
use Illuminate\Support\Carbon;
use Jenssegers\Date\Date;
use Illuminate\Support\Facades\DB;

// Modelos adicionadas
use App\Models\expedientes\Movimiento;
use App\Models\expedientes\Estudiante;


class MovimientosController extends Controller
{
    public function index()
    {
        return view('expediente.movimientos.charts');
    }

    public function MovimientosMonth(Request $request)
    {
        $range = ($request->input('range')!=null) ? $request->input('range') : 'Todos';

        if ($range=='Todos') {
            $finicial = Carbon::now()->SubYear(10);
            $ffinal = Carbon::now()->AddYear(10);
        }else{
            $finicial = Carbon::now()->subMonth($range);
            $ffinal = Carbon::now();
        }

        $month = Movimiento::select(DB::raw('count(id) as value'),DB::raw('MONTH(created_at) as month'))
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
            $bcolors = $colors;
        }

        if ($request->input('tipo')=='line') {
            $colors = 'rgba(100, 200, 100,0.2)';
            $bcolors = "rgba(100, 200, 100,1)";
        }

        $ChartDataSQL = [
            'labels'=>$label_month,
            'datasets'=>[
                [
                    "label"=>"Movimientos",
                    "backgroundColor"=>$colors,
                    "borderColor"=>$bcolors,
                    "borderWidth"=>2,
                    "data"=>$values
                ]
            ]
        ];

        return json_encode($ChartDataSQL);
    }

    public function MovimientosUsers(Request $request)
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

        $movimientos = Movimiento::select('users.username', DB::raw('count(users.username) as value'))
            ->join('users', 'users.id', '=', 'movimientos.user_id')
            ->Where('movimientos.created_at', '>=', $finicial)
            ->Where('movimientos.created_at', '<=', $ffinal)
            ->groupby('movimientos.user_id')
            ->orderBy('movimientos.user_id', 'asc')
            ->get()
            ->take($limit);

        $labels = $movimientos->pluck('username');
        $values = $movimientos->pluck('value');

        for ($i=0; $i < count($labels) ; $i++) {
            $colors[] = 'rgba('.rand(0,255).', '.rand(0,255).', '.rand(0,255).', 1)';
        }

        $ChartDataSQL = [
            'labels'=>$labels,
            'datasets'=>[
                [
                    "label"=>"Movimientos",
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
