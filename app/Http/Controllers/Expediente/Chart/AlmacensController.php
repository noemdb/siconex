<?php

namespace App\Http\Controllers\Expediente\Chart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Helpers
use Illuminate\Support\Carbon;
use Jenssegers\Date\Date;
use Illuminate\Support\Facades\DB;

// Modelos adicionadas
use App\Models\expedientes\Almacen;
use App\Models\expedientes\Nivel;
use App\Models\expedientes\Ruta;
use App\Models\expedientes\Movimiento;
use App\Models\expedientes\Expediente;
use App\Models\expedientes\Documento;

class AlmacensController extends Controller
{
    public function index()
    {
        return view('expediente.almacens.charts');
    }

    public function AlmacenMonth(Request $request)
    {

        $range = ($request->input('range')!=null) ? $request->input('range') : 'Todos';

        if ($range=='Todos') {
            $finicial = Carbon::now()->SubYear(10);
            $ffinal = Carbon::now()->AddYear(10);
        }else{
            $finicial = Carbon::now()->subMonth($range);
            $ffinal = Carbon::now();
        }

        $month = Almacen::select(DB::raw('count(id) as value'),DB::raw('MONTH(created_at) as month'))
            ->Where('created_at', '>=', $finicial)
            ->Where('created_at', '<=', $ffinal)
            ->groupby('month')
            ->orderBy('month', 'asc')
            ->get();

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
                    "label"=>"Almacenes Registrados",
                    "backgroundColor"=>"rgba(100, 200, 43,0.2)",
                    "borderColor"=>"rgba(100, 200, 43,1)",
                    "borderWidth"=>2,
                    "data"=>$values
                ]
            ]
        ];

        return json_encode($ChartDataSQL);
    }

    public function AlmacensMovs(Request $request)
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

        $dataSQL = Movimiento::select('almacens.nombre', DB::raw('count(movimientos.id) as value'))
        	->join('nivels','nivels.id','=','movimientos.nivel_id')
        	->join('almacens','almacens.id','=','nivels.almacen_id')
            ->Where('movimientos.created_at', '>=', $finicial)
            ->Where('movimientos.created_at', '<=', $ffinal)
            ->groupby('almacens.nombre')
            ->orderBy('almacens.nombre', 'asc')
            ->get()
            ->take($limit);

        $labels = $dataSQL->pluck('nombre');
        $values = $dataSQL->pluck('value');

        // for ($i=0; $i < count($labels) ; $i++) {
        	// $colors[] = 'rgba('.rand(0,255).', '.rand(0,255).', '.rand(0,255).', 1)';
        // }

        unset($ChartDataSQL);
        //tipo pie
        $ChartDataSQL = [
            'labels'=>$labels,
            'datasets'=>[
                [
                    "label"=>"Expedientes por Almacenes",
                    "backgroundColor"=>$labels,
                    "borderColor"=>"rgba(0, 0, 0,0.2)",
                    "data"=>$values
                ]
            ]
        ];

        return json_encode($ChartDataSQL);
    }

    public function AlmacensExps(Request $request)
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

        $dataSQL = Movimiento::select('almacens.nombre', DB::raw('count(movimientos.expediente_id) as value'))
        	->join('nivels','nivels.id','=','movimientos.nivel_id')
        	->join('almacens','almacens.id','=','nivels.almacen_id')
            ->Where('movimientos.created_at', '>=', $finicial)
            ->Where('movimientos.created_at', '<=', $ffinal)
            ->groupby('almacens.nombre')
            ->orderBy('almacens.nombre', 'asc')
            ->get()
            ->take($limit);

        // dd($dataSQL);

        $labels = $dataSQL->pluck('nombre');
        $values = $dataSQL->pluck('value');

        // for ($i=0; $i < count($labels) ; $i++) {
        	// $colors[] = 'rgba('.rand(0,255).', '.rand(0,255).', '.rand(0,255).', 1)';
        // }
        unset($ChartDataSQL);
        //tipo pie
        $ChartDataSQL = [
            'labels'=>$labels,
            'datasets'=>[
                [
                    "label"=>"Expedientes por Almacenes",
                    "backgroundColor"=>$labels,
                    "borderColor"=>"rgba(0, 0, 0,0.2)",
                    "data"=>$values
                ]
            ]
        ];

        return json_encode($ChartDataSQL);
    }

    public function AlmacensDocs(Request $request)
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

        // $documentos = DB::table('documentos')->distinct()->pluck('tipo');
        // dd($documentos);

        $dataSQL = Documento::select('almacens.nombre', DB::raw('count(documentos.id) as value'))
        	->join('expedientes','expedientes.id','=','documentos.expediente_id')
        	->join('movimientos','expedientes.id','=','movimientos.expediente_id')
        	->join('nivels','nivels.id','=','movimientos.nivel_id')
        	->join('almacens','almacens.id','=','nivels.almacen_id')
            ->Where('expedientes.created_at', '>=', $finicial)
            ->Where('expedientes.created_at', '<=', $ffinal)
            ->groupby('almacens.nombre')
            ->orderBy('almacens.nombre', 'asc')
            ->get()
            ->take($limit);

        // dd($dataSQL);

        $labels = $dataSQL->pluck('nombre');
        $values = $dataSQL->pluck('value');

        // dd($labels,$values);

        // for ($i=0; $i < count($labels) ; $i++) {
        	// $colors[] = 'rgba('.rand(0,255).', '.rand(0,255).', '.rand(0,255).', 1)';
        // }
        unset($ChartDataSQL);
        //tipo pie
        $ChartDataSQL = [
            'labels'=>$labels,
            'datasets'=>[
                [
                    "label"=>"Documentos por Almacenes",
                    "backgroundColor"=>$labels,
                    "borderColor"=>"rgba(0, 0, 0,0.2)",
                    "data"=>$values
                ]
            ]
        ];


        return json_encode($ChartDataSQL);
    }

}
