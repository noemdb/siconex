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
// use App\Models\sys\Task;
// use App\Models\sys\Profile;
// use App\Models\sys\Rol;
// use App\Models\sys\Messege;
// use App\Models\sys\Alert;
// use App\Models\sys\Loginout;
// use App\Models\sys\Logdb;

class UsersController extends Controller
{

    public function index()
    {
        
        return view('admin.users.charts');
    }

    public function UserActive(Request $request)
    {

        $range = ($request->input('range')!=null) ? $request->input('range') : 'Todos';
        $limit = ($request->input('limit')!=null) ? $request->input('limit') : 8;

        if($range=='Todos'){
            $fecha = Carbon::now();
        }else{
            $fecha = Carbon::now()->subDays($range);
        }

        $users = 
            User::select('is_active',DB::raw('count(is_active) as users_count'))
            ->Where('created_at', '<=', $fecha)
            // ->Where('created_at', '<=', $ffinal)
            ->groupby('is_active')
            ->orderBy('users_count', 'desc')
            ->get();
            // ->take($limit);

        //dd($users->toarray());

        $labels = $users->pluck('is_active');
        $values = $users->pluck('users_count');
        for ($i=0; $i < count($labels) ; $i++) { 
            $colors[] = 'rgba('.rand(0,255).', '.rand(0,255).', '.rand(0,255).', 1)';
        }

        // dd($labels , $values, $colors);

        unset($ChartDataSQL);
        $ChartDataSQL = [
            'labels'=>$labels,
            'datasets'=>[
                [
                    "label"=>"Usuarios Act/Des",
                    "backgroundColor"=>$colors,
                    "data"=>$values
                ]
            ]
        ];

        // dd($tasks);

        return json_encode($ChartDataSQL);
    }

}
