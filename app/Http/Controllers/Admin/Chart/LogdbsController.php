<?php

namespace App\Http\Controllers\Admin\Chart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Helpers
use Illuminate\Support\Carbon;
use Jenssegers\Date\Date;
use Illuminate\Support\Facades\DB;

// Modelos adicionadas
use App\User;
use App\Models\sys\Logdb;

class LogdbsController extends Controller
{
    public function index()
    {        
        return view('admin.logdbs.charts');
    }

	public function LogdbsMonth(Request $request)
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

        $usersmonth = Logdb::select(DB::raw('count(id) as value'),DB::raw('MONTH(created_at) as month'))
            ->Where('created_at', '>=', $finicial)
            ->Where('created_at', '<=', $ffinal)
            ->groupby('month')
            ->orderBy('month', 'asc')
            ->get();

        // dd($range,$usersmonth);

        //INI nombre de los meses en español
        $labels = $usersmonth->pluck('month');
        $label_month = array();
        foreach ($labels as $key => $value) {
            $dateObj   = Date::createFromFormat('!m', $value);
            $label_month[] = ucfirst($dateObj->format('F'));
        }
        $values = $usersmonth->pluck('value');
        //FIN nombre de los meses en español

        //dd($labels, $label_month, $values);

        $ChartDataSQL = [
            'labels'=>$label_month,
            'datasets'=>[
                [
                    "label"=>"Consultas BD Registradas",
                    "backgroundColor"=>"rgba(192, 57, 43,0.2)",
                    "borderColor"=>"rgba(192, 57, 43,1)",
                    "borderWidth"=>2,
                    "data"=>$values
                ]
            ]
        ];

        return json_encode($ChartDataSQL);
    }

    public function LogdbsUsers(Request $request)
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

        $loginouts = Logdb::select('users.username', DB::raw('count(users.username) as value'))
            ->join('users', 'users.id', '=', 'logdbs.user_id')
            ->Where('logdbs.created_at', '>=', $finicial)
            ->Where('logdbs.created_at', '<=', $ffinal)
            ->groupby('logdbs.user_id')
            ->orderBy('logdbs.user_id', 'asc')
            ->get()
            ->take($limit);

        $labels = $loginouts->pluck('username');
        $values = $loginouts->pluck('value');

        unset($ChartDataSQL);
        $ChartDataSQL = [
            'labels'=>$labels,
            'datasets'=>[
                [
                    "label"=>"Cantidad de Registros",
                    "backgroundColor"=>"rgba(80,187,205,0.2)",
                    "borderColor"=>"rgba(80,187,205,1)",
                    "borderWidth"=>2,
                    "data"=>$values
                ]
            ]
        ];

        return json_encode($ChartDataSQL);
    }

    public function LogdbsActions(Request $request)
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

        $rols = Logdb::select('action', DB::raw('count(action) as value'))
            ->Where('created_at', '>=', $finicial)
            ->Where('created_at', '<=', $ffinal)
            ->groupby('action')
            ->orderBy('action', 'asc')
            ->get()
            ->take($limit);

        $labels = $rols->pluck('action');
        $values = $rols->pluck('value');

        unset($ChartDataSQL);
        $ChartDataSQL = [
            'labels'=>$labels,
            'datasets'=>[
                [
                    "label"=>"Cantidad de Actions",
                    "backgroundColor"=>"rgba(80,187,205,0.2)",
                    "borderColor"=>"rgba(80,187,205,1)",
                    "borderWidth"=>2,
                    "data"=>$values
                ]
            ]
        ];

        return json_encode($ChartDataSQL);
    }

}
