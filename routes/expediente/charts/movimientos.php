<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| rutas para los graficos del usuario
|
*/

Route::get('models/charts/movimientos', 'Chart\MovimientosController@index')->name('movimientos.chart');
Route::get('models/charts/movimientosmonths', 'Chart\MovimientosController@MovimientosMonth')->name('movimientos.months.chart');
Route::get('models/charts/almacensmovs', 'Chart\AlmacensController@AlmacensMovs')->name('almacens.movs.chart');
Route::get('models/charts/movimientosusers', 'Chart\MovimientosController@MovimientosUsers')->name('movimientos.users.chart');
// Route::get('models/charts/almacensmovs', 'Chart\AlmacensController@AlmacensMovs')->name('almacens.movs.chart');
// Route::get('models/charts/almacensexps', 'Chart\AlmacensController@AlmacensExps')->name('almacens.exps.chart');
// Route::get('models/charts/almacensdocs', 'Chart\AlmacensController@AlmacensDocs')->name('almacens.docs.chart');
// Route::get('models/charts/profiles', 'Chart\ProfileController@index')->name('viewchartprofiles');
// Route::get('models/charts/rols', 'Chart\RolController@index')->name('viewchartrols');


?>