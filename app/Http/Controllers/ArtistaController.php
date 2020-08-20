<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artista;
use Illuminate\Support\Facades\Validator;

class ArtistaController extends Controller
{
    public function index(){

        //captura datos con los modelos
       $artista = Artista::all();
        //retornar vista que me muestrelos artistas
       return view ('artistas.index')
       ->with('artistas' ,$artsitas);
    }
    public function create(){
        return view('artistas.new');
    }
    public function store(Request $r){
    $reglas=["nombre_artista" => [ 'required' , 'alpha' , 'min:3', 'max:10' , 'unique:artist,Name']
    ];
    $mensajes = [ 'required' => "El nombre del artista es obligatorio",
                    'alpha' => "Solo son validas letras"
    ];

    $validador = Validator::make($r->all(), $reglas, $mensajes);

    if($validador->fails()){

        return redirect('artistas/create')->withErrors($validador);
    }

      //crear el objeto artista
      $nuevo_artista = new Artista();
      //asignamos atributos 
      $nuevo_artista->Name= $r->input('nombre_artista');
      //grabar
      $nuevo_artista->save();
      
      //redreccionar a la vista de nuevo:
      return redirect('artistas/create')->with('exito' , "Artista registrado exitosamente");
    }
}
      