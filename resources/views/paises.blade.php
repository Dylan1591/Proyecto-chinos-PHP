<!DOCTYPE html>
<html lang="es">
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</head>
<header>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
</header>
<br>
<body>
	<h1 class="text-center">Lista de paises</h1>
	<section class="">
	<table class="table">
		<thead class="thead-dark">
			<tr>
				<th scope="col"> PAIS</th>
				<th scope="col">CAPITAL</th>
				<th scope="col">MONEDA</th>
				<th scope="col">POBLACION</th>
				<th scope="col"> Ciudades Principales</th>
			</tr>
		</thead>
		<tbody>
			<!--recorrer la tabla con foreach blade -->
			@foreach($paises as $pais => $infopais)
			<tr>
				<td rowspan="3"> {{ $pais }}</td>
				<td rowspan="3"> {{ $infopais["Capital"] }}</td>
				<td rowspan="3"> {{ $infopais["Moneda"] }}</td>
				<td rowspan="3"> {{ $infopais["Poblacion"] }}</td>
				<td >{{ $infopais["Ciudades"][0] }}</td>
			</tr>
			<TR>
				<th> {{ $infopais["Ciudades"][1] }}</th>
			</TR>
			<tr>
				<th> {{ $infopais["Ciudades"][2] }}</th>
			</tr>
			@endforeach
		</tbody>
	</table>
	</section>

</body>
</html>