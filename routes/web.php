<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//nueva ruta

Route::get('hey tamos devuelta',function() {
	echo "hola ";
	print('qpd');
});

//ruta arreglo
Route::get('arreglo', function() {
	//definir arreglo
	$estudiantes = [  "AN" => "Ana" ,
					 "M" => "Maria" ,
					  "VA" => "Valentina" ,
					  "CA" => "carlos" ];
	echo "<pre>";
	print_r( $estudiantes );
	echo "</pre>";
	//ciclos foreach: recorrer arreglo
	foreach ($estudiantes as $indice => $i) {

		echo "$i  con incide: $indice <br />";

	}
});
//ruta paises
Route::get('paises', function(){
		$paises = ["Colombia =>" => [
         							"Capital" => "Bogota",
         							"Moneda" => "Peso",
         							"Poblacion" => 50372424,
         							"Ciudades" => ["Medellin" , "cali", "Barranquilla"]
								],
					"Peru=>" => 	[
									"Capital" => "Lima",
         							"Moneda" => "Sol",
         							"Poblacion" => 33050325,
         							"Ciudades" => ["Cuzco" , "Trujillo", "Arequipa"]
								],
					"Ecuador=>" => 	[
									"Capital" => "Quito",
         							"Moneda" => "Dolar",
         							"Poblacion" => 17517141,
         							"Ciudades" => ["Guayaquil" , "Manta", "Cuenca"]
								],
		 			"Brazil=>" => 	[
									"Capital" => "Brazilia",
         							"Moneda" => "Real",
         							"Poblacion" => 212216052,
         							"Ciudades" => ["Rio de janeiro" , "Recife", "Baia"]
								],
					"Argentina=>" => 	[
									"Capital" => "Buenos aires",
         							"Moneda" => "Peso",
         							"Poblacion" => 45195777,
         							"Ciudades" => ["Cordoba" , "Rosario", "Mendoza"]
								]
							];

		//enviar datos de paises a una vista
		//con la funcion view
		return view('paises')->with("paises", $paises );
});

//rutas de controlador
route::get('artistas', "ArtistaController@index");
Route::get('artistas/create' , 'ArtistaController@create' );
Route::post('artistas/store', 'ArtistaController@store');
Route::resource('empleados', 'EmpleadoController');
Route::get('master', function(){
	return view('layouts.master');
});