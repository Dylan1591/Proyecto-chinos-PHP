<!DOCTYPE html>

<html lang="es">
<head>
<meta chatset="utf-8">
<title>Nuevo artsita</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.css" integrity="sha512-pli9aKq758PMdsqjNA+Au4CJ7ZatLCCXinnlSfv023z4xmzl8s+Jbj2qNR7RI8DsxFp5e8OvbYGDACzKntZE9w==" crossorigin="anonymous" />


</head>
<body>
<form class="form-horizontal" method="POST" action="{{ url('artistas/store' )}}">
@csrf
<fieldset>

<!-- Form Name -->
<legend>Nuevo artista</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Nombre/banda</label>  
  <div class="col-md-4">
  <input id="textinput" name="nombre_artista" type="text" placeholder="" class="form-control input-md" >
    
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for=""></label>
  <div class="col-md-4">
    <button type="submit" id="" name="" class="btn btn-success">Enviar</button>
  </div>
</div>

</fieldset>
<!--letrero de exito-->
@if( session("exito"))
    <p class="alert-success">{{ session("exito")}}</p>
@else
  @foreach($errors->all() as $error)
  <p class="alert-danger">{{ $error }}</p> 
  @endforeach
@endif

</form>
</body>
</html>