<?php 
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| rutas para los graficos del usuario
|
*/

Route::get('models/charts/estudiantes', 'Chart\EstudiantesController@index')->name('estudiantes.chart');
Route::get('models/charts/estudiantesmonth', 'Chart\EstudiantesController@EstudianteMonth')->name('estudiantes.months.chart');
Route::get('models/charts/estudiantesestados', 'Chart\EstudiantesController@EstudianteEstado')->name('estudiantes.estados.chart');
// Route::get('models/charts/profiles', 'Chart\ProfileController@index')->name('viewchartprofiles');
// Route::get('models/charts/rols', 'Chart\RolController@index')->name('viewchartrols');


?>