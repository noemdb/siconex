<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| rutas para los CRUD (solo resource) de los diferentes modelos DB
|
*/


// INI resource

	//INI LOGICA DEL NEGOCIO
		Route::resource('models/crud/estudiantes','Crud\EstudianteController');
		Route::resource('models/crud/almacens','Crud\AlmacenController');
		Route::resource('models/crud/carreras','Crud\CarreraController');
		Route::resource('models/crud/documentos','Crud\DocumentoController');
		Route::resource('models/crud/estados','Crud\EstadoController');
		Route::resource('models/crud/expedientes','Crud\ExpedienteController');
		Route::resource('models/crud/movimientos','Crud\MovimientoController');
		Route::resource('models/crud/areas','Crud\AreaController');
	//FIN LOGICA DEL NEGOCIO

// FIN resource

 ?>