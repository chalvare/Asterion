<?php
class conexion{
	
	function recuperarPersonaje($pjs){
		$host = "localhost";
		$user = "valaryen";
		$pw = "passval";
		$db = "asterion";

		$con = mysql_connect($host, $user, $pw) or die("No se pudo conectar a la base de datos ");
		mysql_select_db($db, $con) or die ("No se encontro la base de datos. ");

		$query = "SELECT * FROM personajes WHERE id='$pjs'";
		$resultado = mysql_query($query);
		/*echo "<table>";
			while ($fila = mysql_fetch_array($resultado)) {
				echo " <tr>";
				echo "<td> $fila[nombre]  </td> <td> $fila[texto] </td> <br> ";
				echo " </tr> ";
			}
			echo "</table>";
			*/

		$fila = mysql_fetch_array($resultado);
		//echo "<script language='JavaScript'>alert('Grabacion Correcta');</script>";

		return $fila;

	}



	function verificar_login($nombre,$pass){
		session_start();
		$host = "localhost";
		$user = "valaryen";
		$pw = "passval";
		$db = "asterion";
		$con = mysql_connect($host, $user, $pw) or die("No se pudo conectar a la base de datos ");
		mysql_select_db($db, $con) or die ("No se encontro la base de datos. ");
		$sql= "SELECT * FROM user WHERE nombre='$nombre' AND pass='$pass'";
		$result=mysql_query($sql);
		$fila = mysql_fetch_array($result);
		//echo "<script language='JavaScript'>alert('$fila[0]');</script>";
		$count = mysql_num_rows($result);
		if($count == 1){
		     $_SESSION['loggedin'] = true;
			 $_SESSION['username'] = $nombre;
			 $_SESSION['start'] = time();
			 $_SESSION['expire'] = $_SESSION['start'] + (5 * 60) ;
			 $_SESSION['identificador']=$fila[0];
			 //echo "Bienvenido! " . $_SESSION['username']. session_id();
			 //echo "<script language='JavaScript'>alert('asdasas');</script>";
			 header("location:index.php");
		}else {
			echo "<script language='JavaScript'>alert('Username o Password son incorrectos.');</script>";
		}
		
	}
	
	function registrarUsuario($nombre, $pass, $email){
		$host = "localhost";
		$user = "valaryen";
		$pw = "passval";
		$db = "asterion";
		$con = mysqli_connect($host, $user, $pw, $db) or die("No se pudo conectar a la base de datos ");
	
	    $sql="INSERT INTO user VALUES('NULL','".$nombre."','".$pass."','".$email."')";
		
		if (mysqli_query($con, $sql)) {
		    //echo "<script language='JavaScript'>alert('bien creado');</script>";
		    header("location:index.php");
		} else {
		    echo "Error: " . $sql . "<br>" . $con->error;
		    echo "<script language='JavaScript'>alert('mal creado');</script>";
		    header("location:register.php");
		}
		$con->close();
	}


	function mostrarCincoPrimeras(){
		$host = "tot.fdi.ucm.es";
		$user = "parable";
		$pw = "parable1516";
		$db = "parable";

		$con = mysql_connect($host, $user, $pw) or die("No se pudo conectar a la base de datos ");
		mysql_select_db($db, $con) or die ("No se encontro la base de datos. ");
		$query = "SELECT * FROM historia ORDER BY id DESC LIMIT 3";
		$resultado = mysql_query($query);
		echo "<table>";
		while ($fila = mysql_fetch_array($resultado)) {
			echo " <tr>";
			echo "<td> $fila[nombre]  </td> <td> $fila[texto] </td> <br> ";
			echo " </tr> ";
		}
		echo "</table>";
	}
	function mostrarNombre($nombre){
		$host = "tot.fdi.ucm.es";
		$user = "parable";
		$pw = "parable1516";
		$db = "parable";

		$con = mysql_connect($host, $user, $pw) or die("No se pudo conectar a la base de datos ");
		mysql_select_db($db, $con) or die ("No se encontro la base de datos. ");
		$query = "SELECT * FROM historia WHERE nombre='$nombre'";
		$resultado = mysql_query($query);
		echo "<table>";
		while ($fila = mysql_fetch_array($resultado)) {
			echo " <tr>";
			echo "<td> $fila[nombre]  </td> <td> $fila[texto] </td> <br> ";
			echo " </tr> ";
		}
		echo "</table>";
	}
}
?>