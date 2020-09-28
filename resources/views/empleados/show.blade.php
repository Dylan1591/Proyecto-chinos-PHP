@extends('layouts.master')

@section('contenido_vistas')

<h2>Informacion del Empleado:</h2><br>

  <div class="card" style="width:400px">
<div class="card-header">
<h4 class="card-title">{{ $empleado->FirtsName}} {{ $empleado->LastName }}</h4>
</div>
    <div class="card-body">
      <h1 class="card-text">Cargo: {{ $empleado->Title }}</h1>
      <ul class="list-group list-group-flush">
      @if($empleado->jefe_directo)
        <li class="list-group-item">
        {{ $empleado->jefe_directo->FirstName }}
        {{ $empleado->jefe_directo->LastName }}
        </li>
        @endif
        <li class="list-group-item">
            Direccion: {{ $empleado->Address }} , {{ $empleado->City}}, {{ $empleado->Country }}
        <li class="list-group-item">
            Fecha Nacimietno: {{ $empleado->BirthDate->toFormattedDateString() }}  
        <li class="list-group-item">
            Fecha Contratacion: {{ $empleado->HireDate->toFormattedDateString() }}   
      </ul>
    </div>
  </div>
<br>
  @if($empleado->subalternos->count() !==0)
<h2 clas="text-success"> Subalternos:</h2>
<ul class="list-group list-group-flush">
    @foreach( $empleado->subalternos as $subalterno)
    <li class="list-group-item"> {{ $subalterno->FirstName }} , {{ $subalterno->LastName }}</li> 

    @endforeach

</ul>
@else
<h2 class="text-danger">No tiene</h2>
@endif
<h2 clas="text-success"> clientes: </h2>
@if($empleado->clientes->count() !==0)

<ul class="list-group list-group-flush">
    @foreach( $empleado->clientes as $cliente)
    <li class="list-group-item"> {{ $cliente->FirstName }} , {{ $cliente->LastName }}</li> 

    @endforeach

</ul>
@else
<h2 class="text-danger">No tiene</h2>
@endif


@endsection