<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| rutas para las createWithid de los diferentes modelos DB
|
*/


//INI POA
Route::get('models/crud/areas/createWithid/{id}','Crud\AreaController@CreateWithid')->name('areas.createwithid');

Route::get('models/crud/movimientos/createWithAreaId/{id}','Crud\MovimientoController@CreateWithAreaId')->name('movimientos.createwithareaid');
Route::get('models/crud/movimientos/createWithExpId/{id}','Crud\MovimientoController@CreateWithExpId')->name('movimientos.createwithexpid');

Route::get('models/crud/documentos/createWithExpId/{id}','Crud\DocumentoController@CreateWithExpId')->name('documentos.createwithexpid');

Route::get('models/crud/expedientes/createWithEstuId/{id}','Crud\ExpedienteController@CreateWithEstuId')->name('expedientes.createwithestuid');

Route::get('models/crud/carreras/createWithEstuId/{id}','Crud\CarreraController@CreateWithEstuId')->name('carreras.createwithestuid');

Route::get('models/crud/estados/createWithEstuId/{id}','Crud\EstadoController@CreateWithEstuId')->name('estados.createwithestuid');

// Route::get('models/crud/expedientes/createWithid/{id}','Crud\ExpedienteController@CreateWithid')->name('expedientes.createwithid');

// Route::get('models/crud/poa/mproblemas/pdeterminantes/createWithid/{id}','Crud\poa\problemas\PdeterminanteController@createWithid')->name('pdeterminante.createWithid');
// Route::get('models/crud/poa/mproblemas/pcausaefectos/createWithid/{id}','Crud\poa\problemas\PcausaefectoController@createWithid')->name('pcausaefecto.createWithid');
// Route::get('models/crud/poa/mobjetivos/mobjetivos/createWithid/{id}','Crud\poa\objetivos\MobjetivoController@createWithid')->name('mobjetivo.createWithid');
//FIN POA

 ?>