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
	<link href="profile/css/style.css" rel="stylesheet">
	<script type="text/javascript" src="profile/js/jquery.js"></script>
	
	
	
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
                    <li class="active"><a href="index.php">Home</a></li>
					<li class="dropdown">
		                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Guía <span class="caret"></span></a>
		                <ul class="dropdown-menu">
			              <li><a href="index.php#como">Como jugar</a></li>
		                  <li><a href="index.php#personajes">Personajes</a></li>
		                  <li><a href="index.php#compras">Compra de mejoras</a></li>
		                  <li><a href="index.php#asignaturas">Asignaturas</a></li>
		                  <!--<li role="separator" class="divider"></li>
		                  <li class="dropdown-header">Nav header</li>
		                  <li><a href="#">Separated link</a></li>
		                  <li><a href="#">Cerrar Sesión</a></li>-->
		                </ul>
		             </li>
                    <?php
	                    include("php/menuP.php");
	                    $con = new menuP();
	                    $con->menu();
	                    
					?>
					
					
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
				<?php 
					include("php/profileP.php");
					$con = new profileP();					
					$con->cargarImagenUsuario();
				?>
				<form role="form" class="form-horizontal formImagen" method="post" action="php/fileP.php" enctype="multipart/form-data">
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
				<?php
					
					$con = new profileP();
					$con-> cargarImagen($_SESSION['identificador']);
					
				?>
				</div>
				
				<div class='col-sm-6'>

		<?php
			$con = new profileP();
			$con-> cargarDatosPj($_SESSION['identificador']);
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
					$con = new profileP();
					$con->mostrarMejorasPersonaje($_SESSION['identificador']);
				?>
			
			</table>
			</div>
		</div><!--Row 2-->
		
		
		<div class="row">
			<div class="col-sm-12">
			<table id="tablaMejoras"class="table table-hover tablaCompras">
				<thead>
					<th>Asignatura</th>
					<th>Acrónimo</th>
					<th>Nota</th>
					<th>Matrícula</th>
				</thead>
				
					<!--<td><button  id="botonComprar" type="button" class="btn btn-primary">Compra</button></td>-->
				<?php
					$con = new profileP();
					$con->mostrarAsignaturasPersonaje($_SESSION['identificador']);
				?>
			
			</table>
			</div>
		</div><!--Row 3-->
	</div><!--Container-->	
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
	<?php
		$con=new menuP();
		$con->pie();	
	?>
		
		


</body>
</html>