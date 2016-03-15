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
	<link href="index/css/style.css" rel="stylesheet">

		<?php
			session_start();
			if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
				
			//echo "<script language='JavaScript'>alert('".$_SESSION['identificador']."');</script>";
			}else{
				/*echo"<div class='container sinPermiso'><div class='starter-template'><h1>Esta pagina es solo para usuarios registrados.</h1>
				<p class='lead'><a href='register.php'>¡Registrate con nosotros!</a></p></div></div>";
				exit;
				*/
			}
			$now = time(); // checking the time now when home page starts
			
			if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $now > $_SESSION['expire']){
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
			              <li><a href="#como">Como jugar</a></li>
		                  <li><a href="#personajes">Personajes</a></li>
		                  <li><a href="#compras">Compra de mejoras</a></li>
		                  <li><a href="#asignaturas">Asignaturas</a></li>
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
	<div class="fondoCarrusel">
	<div id="carousel-example-generic" class="carousel slide carruselAncho" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    <li data-target="#carousel-example-generic" data-slide-to="3"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner " role="listbox">
    <div class="item active">
      <img src="images/portada/4.jpg" class="imagenes" >
      <div class="carousel-caption">
         <h3><a class="aCarrusel" href="#como">Como jugar</a></h3>
		 <p>Aprende a jugar en Asterion con unos sencillos pasos</p>
      </div>
    </div>
    <div class="item">
      <img src="images/portada/1.jpg" class="imagenes" >
      <div class="carousel-caption">
	    <h3><a class="aCarrusel" href='#personajes'>Personajes</a></h3>
		<p>Elige un personaje con el que te identifiques</p>
      </div>
    </div>
    <div class="item">
      <img src="images/portada/3.jpg" class="imagenes">
      <div class="carousel-caption">
	    <h3><a class="aCarrusel" href='#compras'>Comprar Mejoras</a></h3>
		<p>Mejora tu personaje para conseguir más seguridad a la hora de enfrentarte a las asignaturas</p>
      </div>
    </div>
    <div class="item">
      <img src="images/portada/2.jpg" class="imagenes">
      <div class="carousel-caption">
	    <h3><a class="aCarrusel" href='#asignaturas'>Asignaturas</a></h3>
		<p>Aprende cuando debes enfrentarte a cada asignatura y los Studys que puedes ganar. O perder...</p>
      </div>
    </div>
    
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
	
	</div>

	 <div id="como" class="container ayuda">
		 <div class="pull-left">
			 <img src="images/personajes/1.jpg" class="imagenAyuda" >
			 
		 </div>
		 <div>
			 <p class="lead"><strong>¿Cómo Jugar?</strong></p>
		 <p>como visto las mejores mentes de mi generación destruidas por la locura. Histéricos famélicos muertos de hambre arrastrándose por las calles, negros al amanecer buscando una dosis furiosa. Cabezas de ángel abrasadas por la antigua conexión celestial al dínamo estrellado de la maquinaria de la noche, quienes pobres y andrajosos y con ojos cavernosos y altos se levantaron fumando en la oscuridad sobrenatural de los departamentos con agua fría flotando a través de las alturas de las ciudades contemplando el jazz.</p>
		 <p>como visto las mejores mentes de mi generación destruidas por la locura. Histéricos famélicos muertos de hambre arrastrándose por las calles, negros al amanecer buscando una dosis furiosa. Cabezas de ángel abrasadas por la antigua conexión celestial al dínamo estrellado de la maquinaria de la noche, quienes pobres y andrajosos y con ojos cavernosos y altos se levantaron fumando en la oscuridad sobrenatural de los departamentos con agua fría flotando a través de las alturas de las ciudades contemplando el jazz.</p>
		 <p>como visto las mejores mentes de mi generación destruidas por la locura. Histéricos famélicos muertos de hambre arrastrándose por las calles, negros al amanecer buscando una dosis furiosa. Cabezas de ángel abrasadas por la antigua conexión celestial al dínamo estrellado de la maquinaria de la noche, quienes pobres y andrajosos y con ojos cavernosos y altos se levantaron fumando en la oscuridad sobrenatural de los departamentos con agua fría flotando a través de las alturas de las ciudades contemplando el jazz.</p>
		 </div>
	 </div>
	 
	 
	  <div id="personajes" class="container ayuda">
		  <div class="pull-left">
			 <img src="images/personajes/2.jpg" class="imagenAyuda">
		 </div>
		 <div>
			 <p class="lead"><strong>Elige un personaje</strong></p>
		 <p>como visto las mejores mentes de mi generación destruidas por la locura. Histéricos famélicos muertos de hambre arrastrándose por las calles, negros al amanecer buscando una dosis furiosa. Cabezas de ángel abrasadas por la antigua conexión celestial al dínamo estrellado de la maquinaria de la noche, quienes pobres y andrajosos y con ojos cavernosos y altos se levantaron fumando en la oscuridad sobrenatural de los departamentos con agua fría flotando a través de las alturas de las ciudades contemplando el jazz.</p>
		 <p>como visto las mejores mentes de mi generación destruidas por la locura. Histéricos famélicos muertos de hambre arrastrándose por las calles, negros al amanecer buscando una dosis furiosa. Cabezas de ángel abrasadas por la antigua conexión celestial al dínamo estrellado de la maquinaria de la noche, quienes pobres y andrajosos y con ojos cavernosos y altos se levantaron fumando en la oscuridad sobrenatural de los departamentos con agua fría flotando a través de las alturas de las ciudades contemplando el jazz.</p>
		 <p>como visto las mejores mentes de mi generación destruidas por la locura. Histéricos famélicos muertos de hambre arrastrándose por las calles, negros al amanecer buscando una dosis furiosa. Cabezas de ángel abrasadas por la antigua conexión celestial al dínamo estrellado de la maquinaria de la noche, quienes pobres y andrajosos y con ojos cavernosos y altos se levantaron fumando en la oscuridad sobrenatural de los departamentos con agua fría flotando a través de las alturas de las ciudades contemplando el jazz.</p>
		 </div>
	  </div>
	  
	  
	   <div id="compras" class="container ayuda">
		  <div class="pull-left">
			 <img src="images/personajes/3.jpg" class="imagenAyuda">
		 </div>
		 <div>
			 <p class="lead"><strong>Mejora tu personaje</strong></p>
		 <p>como visto las mejores mentes de mi generación destruidas por la locura. Histéricos famélicos muertos de hambre arrastrándose por las calles, negros al amanecer buscando una dosis furiosa. Cabezas de ángel abrasadas por la antigua conexión celestial al dínamo estrellado de la maquinaria de la noche, quienes pobres y andrajosos y con ojos cavernosos y altos se levantaron fumando en la oscuridad sobrenatural de los departamentos con agua fría flotando a través de las alturas de las ciudades contemplando el jazz.</p>
		 <p>como visto las mejores mentes de mi generación destruidas por la locura. Histéricos famélicos muertos de hambre arrastrándose por las calles, negros al amanecer buscando una dosis furiosa. Cabezas de ángel abrasadas por la antigua conexión celestial al dínamo estrellado de la maquinaria de la noche, quienes pobres y andrajosos y con ojos cavernosos y altos se levantaron fumando en la oscuridad sobrenatural de los departamentos con agua fría flotando a través de las alturas de las ciudades contemplando el jazz.</p>
		 <p>como visto las mejores mentes de mi generación destruidas por la locura. Histéricos famélicos muertos de hambre arrastrándose por las calles, negros al amanecer buscando una dosis furiosa. Cabezas de ángel abrasadas por la antigua conexión celestial al dínamo estrellado de la maquinaria de la noche, quienes pobres y andrajosos y con ojos cavernosos y altos se levantaron fumando en la oscuridad sobrenatural de los departamentos con agua fría flotando a través de las alturas de las ciudades contemplando el jazz.</p>
		 </div>
	   </div>
	   
	   
	   <div id="asignaturas" class="container ayuda" >
		   <div class="pull-left">
			 <img src="images/personajes/4.jpg" class="imagenAyuda">
		 </div>
		 <div>
			 <p class="lead"><strong>Enfréntate a las asignaturas</strong></p>
		 <p>como visto las mejores mentes de mi generación destruidas por la locura. Histéricos famélicos muertos de hambre arrastrándose por las calles, negros al amanecer buscando una dosis furiosa. Cabezas de ángel abrasadas por la antigua conexión celestial al dínamo estrellado de la maquinaria de la noche, quienes pobres y andrajosos y con ojos cavernosos y altos se levantaron fumando en la oscuridad sobrenatural de los departamentos con agua fría flotando a través de las alturas de las ciudades contemplando el jazz.</p>
		 <p>como visto las mejores mentes de mi generación destruidas por la locura. Histéricos famélicos muertos de hambre arrastrándose por las calles, negros al amanecer buscando una dosis furiosa. Cabezas de ángel abrasadas por la antigua conexión celestial al dínamo estrellado de la maquinaria de la noche, quienes pobres y andrajosos y con ojos cavernosos y altos se levantaron fumando en la oscuridad sobrenatural de los departamentos con agua fría flotando a través de las alturas de las ciudades contemplando el jazz.</p>
		 <p>como visto las mejores mentes de mi generación destruidas por la locura. Histéricos famélicos muertos de hambre arrastrándose por las calles, negros al amanecer buscando una dosis furiosa. Cabezas de ángel abrasadas por la antigua conexión celestial al dínamo estrellado de la maquinaria de la noche, quienes pobres y andrajosos y con ojos cavernosos y altos se levantaron fumando en la oscuridad sobrenatural de los departamentos con agua fría flotando a través de las alturas de las ciudades contemplando el jazz.</p>
		 </div>
	  </div>
      
	<?php
	$con=new menuP();
	$con->pie();	
	?>










</body>
</html>