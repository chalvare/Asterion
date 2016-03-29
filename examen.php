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
	<link rel="shortcut icon" href="images/favicon.ico" />
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
				$('#ralentizar').hide();
	            setTimeout(function(){
					 $envio=$('#volverAAsignaturas').find('input[type=submit]');
					 $envio.click();
				}, 3000);
			});
			
			
			
			var porcentaje =0;
			var status;
			 $(document).ready(function(){
				
				status = setInterval(function(){
					porcentaje=porcentaje + 10;
					$('#progreso').css("width",porcentaje+"%");
					if(porcentaje==100) {
						clearInterval(status);
						$('#ralentizar').show();
					}
				}, 100);
				
			});
			

		</script>
</head>


<body>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
   	<script type="text/javascript" src="bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>

	


	  <div class="container">
		  <div class="row">
			<div class="progress capaProgreso">
				  <div id="progreso" class="progress-bar progress-bar-info progress-bar-striped active barraProgreso" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width:0%">
				    Realizando Examen
				  </div>
				</div>
			   <?php
				   
				    include("php/examenP.php");
				  
					$resultado=0;
					 
			  if(isset($_POST['submit'])){
					$ida = $_POST['idAsig'];
					$Con=new examenP();
					$resultado= $Con->calcularResultado($_SESSION['identificador'],$_POST['idAsig'],$_POST['dificultad'],$_POST['examen'], $_POST['precio']);
					//$resultado = 6;
					if($resultado!=0){
						$Con->guardarUsuarioAsignatura($_POST['idAsig'], 1,$resultado, $_POST['anyo']);
						$Con->sumarStudys($_SESSION['identificador'], $_POST['precio']);
						$Con->calcularNivel($_SESSION['identificador'], $resultado, $_POST['creditos']);
						echo"<div id='ralentizar' class='panel panel-success tam'>
							<div class='panel-heading'>
							<span class='glyphicon glyphicon glyphicon-ok' aria-hidden='true'></span>
								¡¡Aprobado!! ¡¡Enhorabuena!!
							</div>
							<div class='panel-body imagenExamen'>
								<img src='images/pass.jpg' class='imagenExamen' width='200' height='240'>
								<p class='textoAprobado'>Has ganado ".$_POST['precio']." Studys</p>
							</div>
						</div>";
					}else{
						$Con->guardarUsuarioAsignatura($_POST['idAsig'], 0,$resultado, $_POST['anyo']);
						echo"<div id='ralentizar' class='panel panel-danger tam'>
							<div class='panel-heading'>
								<span class='glyphicon glyphicon glyphicon-remove' aria-hidden='true'></span>
								¡¡Suspenso!! Lo sentimos. Estudia más la próxima vez.
							</div>
							<div class='panel-body imagenExamen'>
								<img src='images/fail.jpg' class='imagenExamen' width='200' height='240'>
							</div>
						</div>";
					}
					
					
					
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


     
<?php
		/*include("php/menuP.php");
		$con=new menuP();
		$con->pie();	
		*/
	?>









</body>
</html>