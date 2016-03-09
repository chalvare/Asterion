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
	<link href="profile/css/style.css" rel="stylesheet">
	<script>
	$('#myfile').change(function(){
		$('#path').val($(this).val());
	});
	</script>

	<script>
	$(document).ready(function(){
		$("#tablaMejoras").on('click','#botonComprar',function() {
	    var borrarTr = $(this).closest("tr");
	    borrarTr.remove();      
		});
	});
	</script>
	
	
	<?php
		session_start();
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
		//echo "<script language='JavaScript'>alert('".$_SESSION['identificador']."');</script>";
		}else{
			echo"<div class='container sinPermiso'><div class='starter-template'><h1>Esta pagina es solo para usuarios registrados.</h1>
			<p class='lead'><a href='register.php'>¡Registrate con nosotros!</a></p></div></div>";
			exit;
		}
		$now = time(); // checking the time now when home page starts
			
		if($now > $_SESSION['expire'])
		{
			/*session_destroy();
			echo"<div class='container sinPermiso'><div class='starter-template'><h1>Tu sesión ha expirado</h1>
			<p class='lead'><a href='register.php'>Identifícate de nuevo</a></p></div></div>";
			exit;*/
		}
	?>
	
	
	
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
	
	
		
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="tituloPerfil">
					<h1>PERFIL DE USUARIO</h1>
				</div>
			</div>
		</div><!--Row portada-->
		<div class="row row1">
			<div class="col-sm-4">
				<?php echo"<img src=images/usuarios/".$_SESSION['identificador'].".jpg class='img-circle' width='250' height='250'>";?>
				<form role="form" class="form-horizontal formImagen" method="post" action="php/file.php" enctype="multipart/form-data">
					<div class="form-group">
						<input type="file" name="archivo" id="archivo" class="btn btn-primary"/>
					</div>
					<div class="form-group">
						<input type="submit" value="Submit" name="submit" class="btn btn-primary">
					</div>
				</form>
			</div><!--columna izq-->
			
			<div class="col-sm-8">
				
				
				<div class='col-sm-6'>
				<img src='images/personajes/1.jpg' class='img-rounded img-responsive' alt='Cruzado' width='262' height='450'>
				</div>
				
				<div class='col-sm-6'>

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
				
				echo"<p class='lead datosPerfil'>Christian</p>";
				echo"<p class='lead'>Nivel: 187</p>";  
				echo"<p class='lead'>Puntos: 2031</p>";
				
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
		</div>
				
				
			</div><!--columna derecha-->	
		</div><!--Row 1-->
		
		<div class="row">
			<div class="col-sm-12">
			<table id="tablaMejoras"class="table table-hover tablaCompras">
				<thead>
					<th>Nombre</th>
					<th>Tipo</th>
					<th>Mejora</th>
					<th>Cantidad</th>
					<th>Total</th>
				</thead>
				
					<!--<td><button  id="botonComprar" type="button" class="btn btn-primary">Compra</button></td>-->
				<?php
					include("php/profileP.php");
					$con = new profileP();
					$con->mostrarMejorasPersonaje($_SESSION['identificador']);
				?>
			
			</table>
			</div>
		</div><!--Row 2-->
		
	</div><!--Container-->	
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
	
		
		


</body>
</html>