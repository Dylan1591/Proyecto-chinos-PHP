<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

<section class="section mt-5 col-md-12 ">
    <h1 class="text-center mb-5">Lista de empleados</h1>
    <a class="btn btn-primary mb-5" href="{{ url('empleados/create') }}">Nuevo Empleado</a>
        <table class="table responsive">
        <thead class="thead-dark">
            <tr>
                <th>Nombre y apellido</th>
                <th>Cargo</th>
                <th>Email</th>
                <th>Detalles</th>
                <th>Actualizar</th>
            </tr>
        </thead>
        <body>
            @foreach($empleados as $empleado)
                <tr>
                     <td>{{ $empleado->FirstName }} <strong>{{ $empleado->LastName }}</strong></td>
                     <td>{{ $empleado->Title }}</td>
                     <td>{{ $empleado->Email }}</td>
                     <td>
                     <a href="{{  url('empleados/'.$empleado->EmployeeId)   }}"   class="btn btn-success"> Ver Detalles    </a>
                     </a> 
                     </td>
                     <td>
                     <a href="{{  url('empleados/'.$empleado->EmployeeId.'/edit')   }}"   class="btn btn-success"> Actualizar    </a>
                     </a> 
                     </td>
            @endforeach
        </tbody>
        </table>
        <!--TODO: poner el paginador -->
        {{ $empleados->links() }}
        </section>
</body>
</html>