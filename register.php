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
	<link href="register/css/style.css" rel="stylesheet">
	<script>
	
	$(function() {
		//$("#success-alert").hide();
		
	    $('#login-form-link').click(function(e) {
			$("#login-form").delay(100).fadeIn(100);
	 		$("#register-form").fadeOut(100);
			$('#register-form-link').removeClass('active');
			$(this).addClass('active');
			e.preventDefault();
		});
		$('#register-form-link').click(function(e) {
			$("#register-form").delay(100).fadeIn(100);
	 		$("#login-form").fadeOut(100);
			$('#login-form-link').removeClass('active');
			$(this).addClass('active');
			e.preventDefault();
		});
	
	});
	
	$(function() {
	    $('#register-submit').click(function(e) {
			var pass = $("#passwordR").val();
	 		var passC = $("#confirm-passwordR").val();
	 		if(pass==passC){
		 	}else{
		 		alert('Las contraseñas deben coincidir');	
	 		}
		});
	
	});
	
	/*$(document).ready(function(){
		 $("#success-alert").hide();
	});*/
	
	$(document).ready(function() {
		$("#success-alert").hide();
		$('#login-submit').on('click',function showAlert() {
			$('#success-alert').alert();
			$('#success-alert').fadeTo(2000, 100).slideUp(500, function(){
			$('#success-alert').alert('close');
			});   
		});
	});

 	
	
	</script>

</head>
	
	
<body>
		<?php
		// sent from form
		if (isset($_POST['login-submit'])) {
			
			$username = $_POST['username'];
			$password = $_POST['password'];
								
			include ("php/conexionP.php");
			$Con = new conexionP();
			$Con -> verificar_login($username,$password);
			

		}
								
								
		?>
		<?php
		// sent from form
		if (isset($_POST['register-submit'])) {
			$nombre = $_POST['usernameR'];
			$pass = $_POST['passwordR'];
			$email = $_POST['emailR'];
			if(isset($nombre)&&isset($pass)&&isset($email)){
				include ("php/conexionP.php");
				$Con = new conexionP();
				$Con -> registrarUsuario($nombre, $pass, $email);
			}
		}
								
								
		?>		
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
              <li><a href="php/logout.php">logout</a></li>
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
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="#" class="active" id="login-form-link">Login</a>
							</div>
							<div class="col-xs-6">
								<a href="#" id="register-form-link">Register</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								
																
								
								<form id="login-form" action="register.php" method="post" role="form" style="display: block;">
									<div class="form-group">
										<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" required>
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" required>
									</div>
									<div class="form-group text-center">
										<input type="checkbox" tabindex="3" class="" name="remember" id="remember">
										<label for="remember"> Remember Me</label>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
											</div>
										</div>
									</div>
								</form>
											
													
								
								<form id="register-form" action="" method="post" role="form" style="display: none;">
									<div class="form-group">
										<input type="text" name="usernameR" id="usernameR" tabindex="1" class="form-control" placeholder="Username" value="" required>
									</div>
									<div class="form-group">
										<input type="email" name="emailR" id="emailR" tabindex="1" class="form-control" placeholder="Email Address" value="" required>
									</div>
									<div class="form-group">
										<input type="password" name="passwordR" id="passwordR" tabindex="2" class="form-control" placeholder="Password" required>
									</div>
									<div class="form-group">
										<input type="password" name="confirm-passwordR" id="confirm-passwordR" tabindex="2" class="form-control" placeholder="Confirm Password" required>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
											</div>
										</div>
									</div>
								</form>
								
								<!--<div class="alert alert-success" id="success-alert">
							    <button type="button" class="close" data-dismiss="alert">x</button>
							    <strong>Success! </strong>
							    	Product have added to your wishlist.
								</div>
								-->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>  
      
   
      
      
      
      
      
      
    	
</body>
</html>