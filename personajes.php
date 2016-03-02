<!DOCTYPE html>
<html lang="es">
<head>
	<title></title>
	<meta charset="UTF-8">
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<!-- Librería jQuery requerida por los plugins de JavaScript -->
    <script src="http://code.jquery.com/jquery.js"></script>

	<!--<link rel="stylesheet" href="bootstrap-3.3.6-dist/css/bootstrap-theme.css" >
	<link rel="stylesheet" href="bootstrap-3.3.6-dist/css/bootstrap-theme.css.map" >
	<link rel="stylesheet" href="bootstrap-3.3.6-dist/css/bootstrap-theme.min.css" >
	<link rel="stylesheet" href="bootstrap-3.3.6-dist/css/bootstrap-theme.min.css.map" >
	<link rel="stylesheet" href="bootstrap-3.3.6-dist/css/bootstrap.css" >
	<link rel="stylesheet" href="bootstrap-3.3.6-dist/css/bootstrap.css.map" >
	<link rel="stylesheet" href="bootstrap-3.3.6-dist/css/bootstrap.min.css" >
	<link rel="stylesheet" href="bootstrap-3.3.6-dist/css/bootstrap.min.css.map" >

	<script type="text/javascript" src="bootstrap-3.3.6-dist/js/bootstrap.js"></script>
	<script type="text/javascript" src="bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="bootstrap-3.3.6-dist/js/npm.js"></script>-->

	<link href="bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="personajes/css/style.css" rel="stylesheet">


</head>


<body>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
   	<script type="text/javascript" src="bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>


	<nav class="navbar navbar-inverse">
        <div class="container">
          <div class="navbar-header">
            <a class="navbar-brand" href="#">Asterion</a>
          </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#about">Guía</a></li>
              <li><a href="#contact">Personajes</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Login <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Acceder</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else more</a></li>
                  <li role="separator" class="divider"></li>
                  <li class="dropdown-header">Nav header</li>
                  <li><a href="#">Separated link</a></li>
                  <li><a href="#">Cerrar Sesión</a></li>
                </ul>
              </li>
	        </ul>
          </div><!--/.nav-collapse -->
        </div>
      </nav>

	<!-----------Jumbotron----------->
	<!------------------------------->
	<div class="jumbotron">
	<div class="container">
		<h1>Personajes</h1>
		<p>
			He visto las mejores mentes de mi generación destruidas por la locura. Histéricos famélicos muertos de hambre arrastrándose por las calles, negros al amanecer buscando una dosis furiosa. Cabezas de ángel abrasadas por la antigua conexión celestial al dínamo estrellado de la maquinaria de la noche, quienes pobres y andrajosos y con ojos cavernosos y altos se levantaron fumando en la oscuridad sobrenatural de los departamentos con agua fría flotando a través de las alturas de las ciudades contemplando el jazz.
		</p>
	</div>
	</div>

	<!-----------Contenido----------->
	<!------------------------------->
	<div class="container">
	<div class="row">
			<!-----------Izquierda----------->
			<!------------------------------->
		<?php

		include ("php/conexion.php");
		$Con = new conexion();
		$val;
		if (isset($_POST['submit'])) {
		
			$pjs = $_POST['pjs'];
			$personaje=$Con -> recuperarPersonaje($pjs);
			//echo "<script language='JavaScript'>alert($personaje[1]);</script>";
		
		
		
			echo "<div class='col-sm-6'>";
			echo "<img src='images/personajes/$personaje[0].jpg' class='img-rounded img-responsive' alt='$personaje[1]' width='346' height='600'>";
			echo "</div>";
			//<!-----------Derecha------------->
			//<!------------------------------->
			echo "<div class='col-sm-6'>";
			echo "<form class='form-inline' action='personajes.php' method='post' >";
			echo "<label for='pjs'>Personaje</label>";
			echo "<select class='form-control' name='pjs'>";
			echo "<option value='1'>Cruzado</option>";
			echo "<option value='2'>2</option>";
			echo "<option value='3'>3</option>";
			echo "<option value='4'>4</option>";
			echo "<option value='5'>4</option>";
			echo "</select>";
			echo "<input type='submit' name='submit' class='btn btn-primary'>";
			echo "</form>";
			echo "<p class='textoPersonaje'> $personaje[9] </p>";
		
		}


		?>



			<div class="table-responsive">
				<table class="table caracteristicas">
					<thead>
						<tr>
							<th>Cruzado</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
					  <!-- Aplicadas en las filas -->
					  <tr class="success">
						<td class="success">Inteligencia</td>
					    <td class="info">5</td>
					  </tr>
					  <tr class="success">
						<td class="success">Técnicas</td>
					    <td class="info">3</td>
					  </tr>
					  <tr class="success">
						<td class="success">Grupo</td>
					    <td class="info">4</td>
					  </tr>
					  <tr class="success">
						<td class="success">Constancia</td>
					    <td class="info">9</td>
					  </tr>
					  <tr class="success">
						<td class="success">Organización</td>
					    <td class="info">2</td>
					  </tr>
					  <tr class="success">
						<td class="success">Suerte</td>
					    <td class="info">7</td>
					  </tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	</div>











</body>
</html>