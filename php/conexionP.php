<?php
class conexionP{
	
	function recuperarPersonaje($pjs){
		$host = "localhost";
		$user = "valaryen";
		$pw = "passval";
		$db = "asterion";

		$con = mysqli_connect($host, $user, $pw, $db) or die("No se pudo conectar a la base de datos ");
		
		$query = "SELECT * FROM personajes WHERE id='$pjs'";
		$resultado = mysqli_query($con, $query);
		/*echo "<table>";
			while ($fila = mysql_fetch_array($resultado)) {
				echo " <tr>";
				echo "<td> $fila[nombre]  </td> <td> $fila[texto] </td> <br> ";
				echo " </tr> ";
			}
			echo "</table>";
			*/

		$fila = mysqli_fetch_array($resultado);
		//echo "<script language='JavaScript'>alert('Grabacion Correcta');</script>";

		return $fila;

	}



	function verificar_login($nombre,$pass){
		session_start();
		$host = "localhost";
		$user = "valaryen";
		$pw = "passval";
		$db = "asterion";
		
		
		$con = mysqli_connect($host, $user, $pw, $db) or die("No se pudo conectar a la base de datos ");
		
		$sql= "SELECT * FROM user WHERE nombre='$nombre' AND pass='$pass'";
		$result=mysqli_query($con, $sql);
		$fila = mysqli_fetch_array($result);
		//echo "<script language='JavaScript'>alert('$fila[0]');</script>";
		$count = mysqli_num_rows($result);
		if($count == 1){
		     $_SESSION['loggedin'] = true;
			 $_SESSION['username'] = $nombre;
			 $_SESSION['start'] = time();
			 $_SESSION['expire'] = $_SESSION['start'] + (60 * 60) ;
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


	
	
	
	
	/*
	function pruebaSqlite(){
		$bd = new SQLite3('database.sqlite');
					$sql ='SELECT * FROM personajes';
					$ret = $bd->query($sql);
					   while($row = $ret->fetchArray() ){
					      echo  "$row[0] ";
					      echo  "$row[1]<br>";
					   	}
					   	
						$bd = new SQLite3('database.sqlite');
					   	$sql1="INSERT INTO user (nombre, pass, mail) VALUES('asdasd','ddsss','asda')";
					   	$bd->query($sql1);
	}
	*/
	
	
}
?>