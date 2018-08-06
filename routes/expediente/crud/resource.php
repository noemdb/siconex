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

	//FIN LOGICA DEL NEGOCIO

// FIN resource

 ?>