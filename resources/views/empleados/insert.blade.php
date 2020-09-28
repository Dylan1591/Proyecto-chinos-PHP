

@extends('layouts.master')

@section('estilos-particulares')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection

@section('j-deps')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( ".datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();

  } );
  </script>
@endsection


<div class="main-panel">
                <div class="content-wrapper">
                  <section class="row mt-5">
                    <div class="col-12 grid-margin">
                <div class="table" style="background-color: #D6F8FF;">
                  <div class="card-body">
                    <h4 class="card-title">Nuevo Empleado</h4>
                    @section('contenido_vistas')
                    <form action="{{url('empleados')}} " method="post">
                    @csrf
                    @if(session("mensaje"))
    <p class="alert-success">{{ session("mensaje")   }}</p>
@endif
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nombre</label>
                            <div class="col-sm-9">
                               <input type="text" name="nombre" class="form-control" placeholder="Ingrese el nombre" require>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Apellido</label>
                            <div class="col-sm-9">
                              <input type="text" name="apellido" class="form-control" placeholder="Ingrese el apellido" require> 
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Jefe directo</label>
                            <div class="col-sm-9">
                              <select id="" name="jefe" class="form-control">
                              @foreach($jefes as $j)
                                <option value="{{ $j->EmployeeId }}"> {{ $j->LastName}} , {{ $j->FirstName}}</option>
                              @endforeach
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Cargo</label>
                            <div class="col-sm-9">
                            <select id="" name="cargo" class="form-control">
                              @foreach($cargos as $c)
                                <option> {{ $c->Title}}</option>
                              @endforeach
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Fehca de contratacion</label>
                            <div class="col-sm-9">
                             <input type="text" name="contrato" class="form-control datepicker" >
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Fehca de nacimiento</label>
                                <div class="col-sm-9">
                                 <input type="date" name="nacimiento" class="form-control"  >
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Ciudad</label>
                            <div class="col-sm-9">
                             <input type="text" name="ciudad" class="form-control">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                             <input type="text" name="email" class="form-control">
                            </div>
                          </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Direccion</label>
                            <div class="col-sm-9">
                             <input type="text" name="direccion" class="form-control">
                            </div>
                          </div>
                        </div>

                            <div class="form-group">
                                <button class="btn btn-primary float-right ">Crear</button>
                            </div>
                      </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>

            </section>
          </div>



        </div>
@endsection