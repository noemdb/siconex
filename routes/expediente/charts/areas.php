<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| rutas para los graficos del usuario
|
*/

Route::get('models/charts/areas', 'Chart\AreasController@index')->name('areas.chart');
Route::get('models/charts/areasmonths', 'Chart\AreasController@AreasMonth')->name('areas.months.chart');
Route::get('models/charts/areasmovs', 'Chart\AreasController@AreasMovs')->name('areas.movs.chart');

?>