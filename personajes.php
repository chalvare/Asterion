<!DOCTYPE html>

<html lang="es">
<head>
    <title></title>
    <meta charset="UTF-8"><!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous" type="text/css"><!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous" type="text/css"><!-- Latest compiled and minified JavaScript -->

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous" type="text/javascript">
</script><!-- Librería jQuery requerida por los plugins de JavaScript -->

    <script src="http://code.jquery.com/jquery.js" type="text/javascript">
</script><!--<link rel="stylesheet" href="bootstrap-3.3.6-dist/css/bootstrap-theme.css" >
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
    <link href="bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="personajes/css/style.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="personajes/js/jquery.js"></script>
    
    
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js" type="text/javascript">
</script><!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="bootstrap-3.3.6-dist/js/bootstrap.min.js">
</script>

    <nav class="navbar navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">Asterion</a>
            </div>

            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php">Home</a></li>
					<li class="dropdown">
		                <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Guía <span class="caret"></span></a>
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

    <div class="jumbotron">
        <div class="container">
            <h1>Personajes</h1>

            <p>He visto las mejores mentes de mi generación destruidas por la locura. Histéricos famélicos muertos de hambre arrastrándose por las calles, negros al amanecer buscando una dosis furiosa. Cabezas de ángel abrasadas por la antigua conexión celestial al dínamo estrellado de la maquinaria de la noche, quienes pobres y andrajosos y con ojos cavernosos y altos se levantaron fumando en la oscuridad sobrenatural de los departamentos con agua fría flotando a través de las alturas de las ciudades contemplando el jazz.</p>
        </div>
    </div><!--=========Contenido=========-->
    <!--===========================-->

    <div class="container">
        <div class="row">
            <!--=========Izquierda=========-->
            <!--===========================-->
            <?php
                    include ("php/personajesP.php");
                    $Con = new personajesP();
                    
                    
                    if (isset($_POST['submit'])) {  
                        $pjs = $_POST['pjs'];
                        $personaje=$Con -> recuperarPersonaje($pjs);
                        //echo "<script language='JavaScript'>alert($personaje[1]);</script>";

                        
                    
                    }else{?>
                        <div class='col-sm-6'>
                        <img src='images/personajes/1.jpg' class='img-rounded img-responsive imagepj' alt='Cruzado' width='346' height='600'>
                        </div>
                        
                    <?php
	                    }
                    
                    ?><!--=========Derecha===========-->
            <!--===========================-->

            <div class='col-sm-6'>
                <form id="myForm" class='form-horizontal' action='personajes.php' method='post'>
                    <!--<label for='pjs'>Personaje: </label>-->

                    <div class="form-group">
                        <h2><span class="col-sm-3 label label-primary">Personaje:</span></h2>

                        <div class="col-sm-3">
                            <select id="selPj" class='form-control' name='pjs'>
                                <option value='0'>
                             
                                </option>
                                <option value='1'>
                                    Crusader
                                </option>

                                <option value='2'>
                                    Ranger
                                </option>

                                <option value='3'>
                                    Archer
                                </option>

                                <option value='4'>
                                    Warrior
                                </option>

                                <option value='5'>
                                    Mage
                                </option>

                                <option value='6'>
                                    Elemental
                                </option>
                            </select>
                        </div><input type='submit' name='submit' value="Seleccionar" class='btn btn-primary botonSubmitPj'>
                    </div>
                </form><?php
	                
	                		
                            if (isset($_POST['submit'])) {
	                            $Con -> mostrarPersonaje($personaje);
                                                        
                            }else{?>
	                           
                                <h3>Crusader</h3><p class='textoPersonaje'> ¿Qué camino es el correcto? Mientras me encuentro en este caótico cruce del odio
                 ¿Cuántas formas hay para rogar por este oscuro y maldito sendero del destino? Hay muchas formas, hijo mío, que se encuentran donde las almas de los demonios permanecen. Pero sólo cuesta un segundo de desesperación y duda hasta que al final tu alma gane. Hereda estas tierras, estas cosas, estos sueños que son tuyos, para siempre, adóralos; porque no hay vida en las profundidades del caos que puedas explorar.</p>
                                <div class='table-responsive'>
                                <table class='table caracteristicas'>
                                    <thead>
                                        <tr>
                                            <th>Crusader</th>
                                            <th>Valor</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <!-- Aplicadas en las filas -->
                                      <tr class='info'>
                                        <td >Inteligencia</td>
                                        <td >5</td>
                                      </tr>
                                      <tr class='info'>
                                        <td>Técnicas</td>
                                        <td>3</td>
                                      </tr>
                                      <tr class='info'>
                                        <td>Grupo</td>
                                        <td>2</td>
                                      </tr>
                                      <tr class='info'>
                                        <td>Constancia</td>
                                        <td>2</td>
                                      </tr>
                                      <tr class='info'>
                                        <td>Estudio</td>
                                        <td>4</td>
                                      </tr>
                                      <tr class='info'>
                                        <td >Suerte</td>
                                        <td >2</td>
                                      </tr>
                                    </tbody>
                                </table>
                            </div>
                        <?php    
	                        }
                        ?>
            </div><!--div cierre dech-->
        </div>
    </div>
    <?php
		$con=new menuP();
		$con->pie();	
	?>
</body>
</html>
