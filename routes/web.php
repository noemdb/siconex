<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

Route::get('/menu', function () {
    return view('menu');
});

Auth::routes();

//rutas iniciales
Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/home', 'HomeController@index')->name('home');

//INI establecer setting para los usuarios
// require (__DIR__ . '/settings/users.php');
//FIN establecer setting para los usuarios

//INI rutas para Poa
// Route::group(['prefix'=>'poa','middleware'=>['auth','is_admin','is_poa'],'namespace'=>'Poa'], function(){

//     //INI Route iniciales
//     require (__DIR__ . '/poa/iniciales.php');
//     //FIN Route iniciales

//     //INI CRUD modelos
//     require (__DIR__ . '/poa/crud/resource.php');
//     require (__DIR__ . '/poa/crud/showfull.php');
//     require (__DIR__ . '/poa/crud/createwithid.php');
//     //FIN CRUD modelos

// });
//FIN rutas para Poa

//rutas para admin
Route::group(['prefix'=>'admin','middleware'=>['auth','is_admin'],'namespace'=>'Admin'], function(){

    //INI Route iniciales
    require (__DIR__ . '/admin/iniciales.php');
    //FIN Route iniciales

    //INI CRUD modelos
    require (__DIR__ . '/admin/crud/resource.php');
    // require (__DIR__ . '/admin/crud/showfull.php');
    // require (__DIR__ . '/admin/crud/createwithid.php');
    //FIN CRUD modelos

    //INI Charts modelos
    require (__DIR__ . '/admin/charts/users.php');
    require (__DIR__ . '/admin/charts/profiles.php');
    require (__DIR__ . '/admin/charts/rols.php');
    require (__DIR__ . '/admin/charts/tasks.php');
    require (__DIR__ . '/admin/charts/alerts.php');
    require (__DIR__ . '/admin/charts/messeges.php');
    require (__DIR__ . '/admin/charts/loginouts.php');
    require (__DIR__ . '/admin/charts/logdbs.php');
    //FIN Charts modelos

    //INI rutas para los json
    // require (__DIR__ . '/admin/json/index.php');
    //FIN rutas para los json   

});

//rutas para expediente
Route::group(['prefix'=>'expediente','middleware'=>['auth','is_expediente'],'namespace'=>'Expediente'], function(){

    //INI Route iniciales
    require (__DIR__ . '/expediente/iniciales.php');
    //FIN Route iniciales

    //INI CRUD modelos
    require (__DIR__ . '/expediente/crud/resource.php');
    // require (__DIR__ . '/admin/crud/showfull.php');
    // require (__DIR__ . '/admin/crud/createwithid.php');
    //FIN CRUD modelos

    //INI Charts modelos
    require (__DIR__ . '/expediente/charts/estudiantes.php');
    require (__DIR__ . '/expediente/charts/almacens.php');
    //FIN Charts modelos  

});
