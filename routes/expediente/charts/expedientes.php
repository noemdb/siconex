<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| rutas para los graficos del usuario
|
*/

Route::get('models/charts/expedientes', 'Chart\ExpedientesController@index')->name('expedientes.chart');
Route::get('models/charts/expedientesmonths', 'Chart\ExpedientesController@ExpedienteMonth')->name('expedientes.months.chart');
// Route::get('models/charts/estudiantesestados', 'Chart\EstudiantesController@EstudianteEstado')->name('estudiantes.estados.chart');
// Route::get('models/charts/profiles', 'Chart\ProfileController@index')->name('viewchartprofiles');
// Route::get('models/charts/rols', 'Chart\RolController@index')->name('viewchartrols');


?>