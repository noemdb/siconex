<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| rutas para los graficos del usuario
|
*/

Route::get('models/charts/documentos', 'Chart\DocumentosController@index')->name('documentos.chart');
Route::get('models/charts/documentosmonth', 'Chart\DocumentosController@DocumentosMonth')->name('documentos.months.chart');
Route::get('models/charts/documentostipos', 'Chart\DocumentosController@DocumentosTypes')->name('documentos.tipos.chart');



?>