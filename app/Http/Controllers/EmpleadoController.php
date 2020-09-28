<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empleado; 
use Illuminate\Support\Facades\Validator;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados = \App\Empleado::paginate(3); 
        return view('empleados.index')->with('empleados' , $empleados);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $managers = Empleado::find([1,2,6]); 
        $cargos = Empleado::select("Title")->distinct()->get();
        return view("empleados.insert")->with("jefes" , $managers)->with("cargos" , $cargos );

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //crear objeto
        $empleado = new Empleado();
        $empleado->FirstName = $request->input("nombre");
        $empleado->LastName = $request->input("apellido");
        $empleado->ReportsTo = $request->input("jefe");
        $empleado->Title = $request->input("cargo");
        $empleado->BirthDate = $request->input("nacimiento");
        $empleado->HireDate = $request->input("contrato");
        $empleado->Email = $request->input("email");
        $empleado->Address = $request->input("direccion");
        $empleado->City = $request->input("ciudad");
        $empleado->save();

        echo "empleado registrado";
        return require ('empleados/create')->with("menaje" , "empleado registrado");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $empleado = \App\Empleado::with('subalternos')->with('clientes')->with('jefe_directo')->find($id);
        return view('empleados.show')->with("empleado", $empleado);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleado = Empleado::find($id);
        $managers = Empleado::find([1,2,6]); 
        $cargos = Empleado::select("Title")->distinct()->get();
        return view("empleados.edit")->with("empleado" , $empleado)->with("jefes" , $managers)->with("cargos" , $cargos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $regla=[
            "jefe" => "required"
        ];
        //objeto validador
        $validador = validador::make( $request->all() , $regla);
        
        if($validador->fails()){
            return redirect('empleados/'.$id.'/edit')->withErrors($validador);
        }
        $empleado = Empleado::find($id);
        //atributos
        $empleado->FirstName = $request->input("nombre");
        $empleado->LastName = $request->input("apellido");
        $empleado->ReportsTo = $request->input("jefe");
        $empleado->Title = $request->input("cargo");
        $empleado->BirthDate = $request->input("nacimiento");
        $empleado->HireDate = $request->input("contrato");
        $empleado->Email = $request->input("email");
        $empleado->Address = $request->input("direccion");
        $empleado->City = $request->input("ciudad");
        //guardar
        $empleado->save();
        return redirect("empleados/$empleado->EmployeeId/edit")->with("mensaje" , "empleado actualizado");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
