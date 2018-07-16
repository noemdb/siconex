<?php 
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| rutas para los CRUD de los diferentes modelos DB
|
*/

// INI resource
// Route::resource('models/crud/users','Crud\UserController', ['except' => ['show']]);
// Route::resource('models/crud/profiles','Crud\ProfileController', ['except' => ['show']]);
// Route::resource('models/crud/rols','Crud\RolController', ['except' => ['show']]);
// FIN resource


// INI resource
//INI SYS
Route::resource('models/crud/users','Crud\UserController');
Route::resource('models/crud/profiles','Crud\ProfileController');
Route::resource('models/crud/rols','Crud\RolController');
//FIN SYS

//INI POA
Route::resource('models/crud/poa/institucions','Crud\poa\InstitucionController');
Route::resource('models/crud/poa/direccions','Crud\poa\DireccionController');
Route::resource('models/crud/poa/poas','Crud\poa\PoaController');
Route::get('models/crud/poa/poas/showfull/{id}', 'Crud\poa\PoaController@showFull')->name('poas.showfull');
Route::resource('models/crud/poa/mlogicos','Crud\poa\MlogicoController');
Route::resource('models/crud/poa/responsables','Crud\poa\ResponsableController');

Route::resource('models/crud/poa/mproblemas/mproblemas','Crud\poa\problemas\MproblemaController');
Route::resource('models/crud/poa/mproblemas/pdeterminantes','Crud\poa\problemas\PdeterminanteController');
Route::get('models/crud/poa/mproblemas/pdeterminantes/createWithid/{id}','Crud\poa\problemas\PdeterminanteController@createWithid')->name('pdeterminante.createWithid');
Route::resource('models/crud/poa/mproblemas/pcausaefectos','Crud\poa\problemas\PcausaefectoController');
Route::resource('models/crud/poa/mobjetivos/mobjetivos','Crud\poa\objetivos\MobjetivoController');
Route::resource('models/crud/poa/presupuestarias/presupuestarias','Crud\poa\presupuestarias\PresupuestariaController');
Route::resource('models/crud/poa/mproductos/mproductos','Crud\poa\productos\MproductoController');
Route::resource('models/crud/poa/mproductos/psupuestos','Crud\poa\productos\PsupuestoController');
Route::resource('models/crud/poa/mproductos/pverificadors','Crud\poa\productos\PverificadorController');
Route::resource('models/crud/poa/mproductos/pindicadors','Crud\poa\productos\PindicadorController');
Route::resource('models/crud/poa/mactividads/mactividads','Crud\poa\actividades\MactividadController');
Route::resource('models/crud/poa/mactividads/aestados','Crud\poa\actividades\AestadoController');
Route::resource('models/crud/poa/mactividads/afrecuencias','Crud\poa\actividades\AfrecuenciaController');
//FIN POA

// FIN resource

 ?>