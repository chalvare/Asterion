<?php

class menuP{
	
	function menu(){
		 if(!isset($_SESSION['loggedin'])){
	                    	echo"<li><a href='register.php'>Login/Registro</a></li>";
						}else{
							echo"<li><a href='personajes.php'>Personajes</a></li>";
							echo"<li><a href='mejoras.php'>Comprar Mejoras</a></li>";
							echo"<li><a href='asignaturas.php'>Asignaturas</a></li>";
							echo"<li><a href='profile.php'>Perfil</a></li>";
							echo"<li><a href='php/logout.php'>Logout</a></li>";
						}
	}
	
	
	function pie(){
		echo"<div id='footer' class='pie'>";
	    echo"  <div class='container'>";
		echo"    </p>";
	    echo"    <p class='text-muted '>";
	    echo"        Aplicación desarrollada por Christian Álvarez Sánchez.";
		echo"       	Si deseas contactar conmigo puedes hacerlo aquí:<a href='mailto:chalvare@ucm.es?Subject=Asterion' target='_top'> ";
		echo"       	<span class='glyphicon glyphicon-envelope' aria-hidden='true'></span> Contacar</a>";
	    echo"    </p>";
	    echo"  </div>";
		echo"</div>";
	}
	
	
}	
	
	
?>