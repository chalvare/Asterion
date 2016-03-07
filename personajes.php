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


<script>
		
	$(document).ready(function() {
            $('#selPj').on('change', function() {
               var $form = $(this).closest('form');
			   $form.find('input[type=submit]').click();
            });
        });
        
     
</script>


</head>


<body>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
   	<script type="text/javascript" src="bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>


	<nav class="navbar navbar-inverse">
        <div class="container">
          <div class="navbar-header">
            <a class="navbar-brand" href="index.php">Asterion</a>
          </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li><a href="index.php">Home</a></li>
              <li><a href="#about">Guía</a></li>
              <li class="active"><a href="personajes.php">Personajes</a></li>
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
		
		
		if (isset($_POST['submit'])) {	
			$pjs = $_POST['pjs'];
			$personaje=$Con -> recuperarPersonaje($pjs);
			//echo "<script language='JavaScript'>alert($personaje[1]);</script>";
			echo "<div class='col-sm-6'>";
			echo "<img src='images/personajes/$personaje[0].jpg' class='img-rounded img-responsive imagepj' alt='$personaje[1]' width='346' height='600'>";
			echo "</div>";
			
		
		}else{
			echo "<div class='col-sm-6'>";
			echo "<img src='images/personajes/1.jpg' class='img-rounded img-responsive imagepj' alt='Cruzado' width='346' height='600'>";
			echo "</div>";
			
		}
		
		?>
		<!-----------Derecha------------->
		<!------------------------------->
			<div class='col-sm-6'>
			<form id="myForm" class='form-horizontal' action='personajes.php' method='post' >
			<!--<label for='pjs'>Personaje: </label>-->
				<div class="form-group">
					<h2><span class="col-sm-3 label label-primary">Personaje: </span></h2>
				<div class="col-sm-3">
					<select id="selPj" class='form-control' name='pjs'>
						<option value='0'></option>
						<option value='1'>Crusader</option>
						<option value='2'>Ranger</option>
						<option value='3'>Archer</option>
						<option value='4'>Warrior</option>
						<option value='5'>Mage</option>
						<option value='6'>Elemental</option>
					</select>
				</div>
				<input type='submit' name='submit' value="Seleccionar" class='btn btn-primary botonSubmitPj'>  
				</div>
			</form>

		<?php
			if (isset($_POST['submit'])) {
				$texto=utf8_encode($personaje[9]);
				echo "<h3>$personaje[1]</h3><p class='textoPersonaje'> $texto </p>";
				echo "<div class='table-responsive'>";
				echo "<table class='table caracteristicas'>";
					echo "<thead>";
						echo "<tr>";
							echo "<th>$personaje[1]</th>";
							echo "<th>Valor</th>";
						echo "</tr>";
					echo "</thead>";
					echo "<tbody>";
					 // <!-- Aplicadas en las filas -->
					  echo "<tr class='info'>";
						echo "<td>Inteligencia</td>";
					    echo "<td>$personaje[2]</td>";
					  echo "</tr>";
					  echo "<tr class='info'>";
						echo "<td>Técnicas</td>";
					    echo "<td>$personaje[3]</td>";
					  echo "</tr>";
					  echo "<tr class='info'>";
						echo "<td>Grupo</td>";
					    echo "<td>$personaje[4]</td>";
					  echo "</tr>";
					  echo "<tr class='info'>";
						echo "<td>Constancia</td>";
					    echo "<td>$personaje[5]</td>";
					  echo "</tr>";
					  echo "<tr class='info'>";
						echo "<td>Organización</td>";
					    echo "<td>$personaje[6]</td>";
					  echo "</tr>";
					  echo "<tr class='info'>";
						echo "<td >Suerte</td>";
					    echo "<td >$personaje[7]</td>";
					  echo "</tr>";
					echo "</tbody>";
				echo "</table>";
			echo "</div>";
		
			}else{
				echo "<h3>Char</h3><p class='textoPersonaje'> He visto las mejores mentes de mi generación destruidas por la locura. Histéricos famélicos muertos de hambre arrastrándose por las calles, negros al amanecer buscando una dosis furiosa. Cabezas de ángel abrasadas por la antigua conexión celestial al dínamo estrellado de la maquinaria de la noche, quienes pobres y andrajosos y con ojos cavernosos y altos se levantaron fumando en la oscuridad sobrenatural de los departamentos con agua fría flotando a través de las alturas de las ciudades contemplando el jazz.</p>";
				echo "<div class='table-responsive'>";
				echo "<table class='table caracteristicas'>";
					echo "<thead>";
						echo "<tr>";
							echo "<th>Char</th>";
							echo "<th>Valor</th>";
						echo "</tr>";
					echo "</thead>";
					echo "<tbody>";
					 // <!-- Aplicadas en las filas -->
					  echo "<tr class='info'>";
						echo "<td >Inteligencia</td>";
					    echo "<td >5</td>";
					  echo "</tr>";
					  echo "<tr class='info'>";
						echo "<td>Técnicas</td>";
					    echo "<td>3</td>";
					  echo "</tr>";
					  echo "<tr class='info'>";
						echo "<td>Grupo</td>";
					    echo "<td>4</td>";
					  echo "</tr>";
					  echo "<tr class='info'>";
						echo "<td>Constancia</td>";
					    echo "<td>9</td>";
					  echo "</tr>";
					  echo "<tr class='info'>";
						echo "<td>Organización</td>";
					    echo "<td>2</td>";
					  echo "</tr>";
					  echo "<tr class='info'>";
						echo "<td >Suerte</td>";
					    echo "<td >7</td>";
					  echo "</tr>";
					echo "</tbody>";
				echo "</table>";
			echo "</div>";//fin table-responsive
			}
		?>
		</div><!--div cierre dech-->

	</div>
	</div>


</body>
</html>