<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| rutas para los graficos del usuario
|
*/

Route::get('models/charts/carreras', 'Chart\CarrerasController@index')->name('carreras.chart');
Route::get('models/charts/carrerasestuds', 'Chart\CarrerasController@CarrerasEstuds')->name('carreras.estuds.chart');
// Route::get('models/charts/almacensmovs', 'Chart\AlmacensController@AlmacensMovs')->name('almacens.movs.chart');
// Route::get('models/charts/almacensexps', 'Chart\AlmacensController@AlmacensExps')->name('almacens.exps.chart');
// Route::get('models/charts/almacensdocs', 'Chart\AlmacensController@AlmacensDocs')->name('almacens.docs.chart');
// Route::get('models/charts/profiles', 'Chart\ProfileController@index')->name('viewchartprofiles');
// Route::get('models/charts/rols', 'Chart\RolController@index')->name('viewchartrols');


?>