

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

@section('contenido_vistas')
<div class="main-panel mt-5">
                <div class="content-wrapper">
                  <section class="row mt-5">
                    <div class="col-12 grid-margin">
                <div class="table" style="background-color: #D6F8FF;">
                  <div class="card-body">
                    <h4 class="card-title">Actualizar empleado Empleado {{ $empleado->FirstName}} , {{ $empleado->LastName}}</h4>
 
                    <form action="{{url('empleados/'.$empleado->EmployeeId)}} " method="post">
                    @method('PUT')
                    @csrf
                    @if(session("mensaje"))
                      <p class="alert-success">{{ session("mensaje")   }}</p>
                    @endif
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nombre</label>
                            <div class="col-sm-9">
                               <input type="text" value="{{ $empleado->FirstName}}" name="nombre" class="form-control" placeholder="Ingrese el nombre" require>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Apellido</label>
                            <div class="col-sm-9">
                              <input type="text" value="{{ $empleado->LastName}}" name="apellido" class="form-control" placeholder="Ingrese el apellido" require> 
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
                             
                                @if( $empleado->jefe_directo()->count() === 0)
                                  <option selected value="">...Selecciones el jefe directo</option>
                                  @foreach($jefes as $j)
                                  <option value="{{ $j->EmployeeId }}"> {{ $j->LastName}} , {{ $j->FirstName}}</option>
                                  @endforeach
                                @else
                                <otion value="">...Seleccione jefe directo</option>

                                 @foreach($jefes as $j)
                                @if ($j->EmployeeId === $empleado->jefe_directo()->first()->EmployeeId)
                                  <option selected value="{{ $j->EmployeeId }}"> {{ $j->LastName}} , {{ $j->FirstName}}</option>
                                @else
                                <option value="{{ $j->EmployeeId }}"> {{ $j->LastName}} , {{ $j->FirstName}}</option>
                                
                                @endif
                              @endforeach
                              @endif
                              </select>
                              <p>{{ $errors->first('jefe')}}</p>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Cargo</label>
                            <div class="col-sm-9">
                            <select id="" name="cargo" class="form-control">
                              @foreach($cargos as $c)
                              @if( $empleado->Title === $c->title)
                              <option selected value="{{ $c->Title }}"> {{ $c->Title}} </option>
                              @else
                              <option value="{{ $c->Title }}"> {{ $c->Title}} </option>
                                
                                @endif
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
                             <input type="text" name="contrato" class="form-control datepicker" value="{{ $empleado->HireDate->format('Y-m-d') }}">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Fehca de nacimiento</label>
                                <div class="col-sm-9">
                                 <input type="text" name="nacimiento" class="form-control" id="datepiker" value="{{ $empleado->BirthDate->format('Y-m-d') }} ">
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Ciudad</label>
                            <div class="col-sm-9">
                             <input type="text" name="ciudad" class="form-control" value="{{ $empleado->City }}" >
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                             <input type="text" name="email" class="form-control" value="{{ $empleado->Email}}">
                            </div>
                          </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Direccion</label>
                            <div class="col-sm-9">
                             <input type="text" name="direccion" class="form-control" value="{{ $empleado->Address}}">
                            </div>
                          </div>
                        </div>

                            <div class="form-group">
                                <button class="btn btn-primary float-right ">Actualizar</button>
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
