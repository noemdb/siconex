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
        // INI iconos para menus
        View::share('icon_menus', [
            'sistema'=>'fas fa-wrench',
            'poas'=>'fas fa-th',
            'mlogicos'=>'fab fa-delicious',
            'mproblemas'=>'far fa-newspaper',
            'institucions'=>'fas fa-building',
            'refres'=>'fas fa-redo',
            'back'=>'fas fa-chevron-left',
            'create'=>'fas fa-plus',
            'direcciones'=>'fas fa-warehouse',
            'pdeterminantes'=>'fas fa-list-ul',
            'pcausaefectos'=>'fab fa-flipboard',
            'mobjetivos'=>'fas fa-cubes',
            'presupuestaria'=>'fab fa-monero',
            'mproductos'=>'fab fa-patreon',
            'psupuestos'=>'fab fa-slack-hash',
            'pverificadors'=>'fas fa-check',
            'pindicadors'=>'fas fa-info-circle',
            'mactividads'=>'fas fa-tasks',
            'afrecuencias'=>'fas fa-circle-notch',
            'aestados'=>'fas fa-tag',
            'responsables'=>'far fa-address-card',
            'editar'=>'fas fa-edit',
            'nuevo'=>'fas fa-plus',
            'mostrar'=>'fas fa-info',
            'btn_ctr'=>'fas fa-bullseye',
            'crud'=>'fas fa-align-justify',
            'tline'=>'fas fa-history',
            'matrices'=>'fas fa-table',
            'info'=>'fas fa-info',
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
