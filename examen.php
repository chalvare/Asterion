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
	<link href="examen/css/style.css" rel="stylesheet">

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
				exit;
				*/
			}
		?>
		<script lang="javascript">
			$(document).ready(function() {
	            setTimeout(function(){
					 $envio=$('#volverAAsignatura').find('input[type=submit]');
					 $envio.click();
				}, 2000);
			});
			
			
			
			var porcentaje =0;
			var status;
			 $(document).ready(function(){
				
				status = setInterval(function(){
					porcentaje=porcentaje + 10;
					$('#progreso').css("width",porcentaje+"%");
					if(porcentaje==100) clearInterval(status);
				}, 100);
				
				
				
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
              <li class="active"><a href="index.php">Home</a></li>
              <li><a href="#about">Guía</a></li>
              <li><a href="personajes.php">Personajes</a></li>
              <li><a href="mejoras.php">Comprar Mejoras</a></li>
              <li><a href="profile.php">Perfil</a></li>
              <li><a href="register.php">Login/Registro</a></li>
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
			<div class="progress capaProgreso">
				  <div id="progreso" class="progress-bar progress-bar-info progress-bar-striped active barraProgreso" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width:0%">
				    Realizando Examen
				  </div>
				</div>
			   <?php
				   
				    include("php/examenP.php");
				  $Con=new examenP();
				  $Con->calcularResultado($_SESSION['identificador']);
				   
			  if(isset($_POST['submit'])){
					$ida = $_POST['idAsig'];
					$dificultad = $_POST['dificultad'];
					$examen = $_POST['examen'];
					echo"<br>id asignatura: ".$ida;
					echo"<br>dificultad: ".$dificultad;
					echo"<br>examen: ".$examen;
					echo"<br>usuario: ".$_SESSION['identificador'];
					
					//header("Refresh:2;url=asignaturas.php");
					echo"
					<form action='asignaturas.php' method='post' id='volverAAsignaturas'>
						<input type='hidden' value='$ida' name='hid'>
						<input type='submit' value='submit' name='submit' class='botonSubmitExamen'>
					</form>
					";	
					
				}else{
					echo"noooooo: ";
					//header("Refresh:2;url=asignaturas.php");
					echo"
					<form action='asignaturas.php' method='post'>
						<input type='hidden' value='123' name='hid'>
						<input type='submit' value='submit' name='submit'>
					</form>
					";
				}

	?>		  
	
	        
		  </div>
	  </div>


     










</body>
</html>