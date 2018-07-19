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
<<<<<<< HEAD
            'sistema'=>'fas fa-wrench',
            'brand'=>'fas fa-archive',
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
=======
            'config'=>'fas fa-wrench',
            'sistema'=>'fas fa-cog',
            'brand'=>'fas fa-archive',
            'user'=>'fas fa-user',
            'userplus'=>'fas fa-user-plus',
>>>>>>> 154a3204c4e161d771e739ba9f1c2dc90e102271
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
