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
            'config'=>'fas fa-wrench',
            'sistema'=>'fas fa-cog',
            'brand'=>'fas fa-archive',
            'user'=>'fas fa-user',
            'userplus'=>'fas fa-user-plus',
            'profile'=>'fas fa-id-card',
            'rol'=>'far fa-id-badge',
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
