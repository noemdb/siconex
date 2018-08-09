<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| rutas para los graficos del usuario
|
*/

Route::get('models/charts/nivels', 'Chart\NivelsController@index')->name('nivels.chart');
Route::get('models/charts/nivelsmonths', 'Chart\NivelsController@NivelsMonth')->name('nivels.months.chart');
Route::get('models/charts/nivelsmovs', 'Chart\NivelsController@NivelsMovs')->name('nivels.movs.chart');

?>