<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // INI iconos para menus fas fa-sliders-h
        View::share('icon_menus', [
            'config'=>'fas fa-wrench',
            'sistema'=>'fas fa-cog',
            'brand'=>'fas fa-archive',

            'user'=>'fas fa-user',
            'userplus'=>'fas fa-user-plus',
            'profile'=>'fas fa-id-card',
            'rol'=>'far fa-id-badge',

            'alert'=>'far fa-bell',
            'task'=>'fas fa-tasks',
            'messege'=>'far fa-comments',
            'loginout'=>'fas fa-external-link-alt',
            'logdb'=>'fas fa-database',
            'setting'=>'fas fa-sliders-h',
            'selectopt'=>'fas fa-list',

            'editar'=>'fas fa-edit',
            'nuevo'=>'fas fa-plus',
            'guardado'=>'fas fa-save',
            'mostrar'=>'fas fa-info',
            'btn_ctr'=>'fas fa-bullseye',
            'crud'=>'fas fa-align-justify',
            'tline'=>'fas fa-history',
            'info'=>'fas fa-info',

            'chartpie'=>'fas fa-chart-pie',
            'chartbar'=>'fas fa-chart-bar',
            'chartarea'=>'far fa-chart-area',
            'chartline'=>'fas fa-chart-line',
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
