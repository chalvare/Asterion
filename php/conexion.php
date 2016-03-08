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


	function mostrarMejoras(){
		$host = "localhost";
		$user = "valaryen";
		$pw = "passval";
		$db = "asterion";

		$con = mysqli_connect($host, $user, $pw, $db) or die("No se pudo conectar a la base de datos ");
		
		$query = "SELECT * FROM mejoras";
		$resultado = mysqli_query($con,$query);
		
		if(mysqli_num_rows($resultado)>0){
			echo"<div class='table-responsive'>";
				  echo"<table id='tablaMejoras' class='table tablaMejoras'>";
				  echo"<th>Nombre</th>";
				  echo"<th>Incremento</th>";
				  echo"<th>Precio</th>";
				  echo"<th>Comprar</th>";
				  while ($fila = mysqli_fetch_array($resultado)) {
						echo " <tr>";
						echo "<td> $fila[nombre]  </td> <td> $fila[valor] </td><td>$fila[precio] Studys</td> 
						<td>
						
						<form id='formMejoras' action='mejoras.php' method='post' role='form'>
							<input type='hidden' value='$fila[id]' name='idCompra'>
							<input type='submit' name='submitMejora' value='Compra' class='btn btn-primary'>
						</form>
						</td>	
						
						<br> ";
						echo " </tr> ";
					}
				 
				  echo"</table>";
				  echo"</div>";
				  //<button  id='botonComprar' type='button' class='btn btn-primary'>Compra</button>
			$con->close();	
		}else{
			die("no hay mejoras que mostrar ");
			$con->close();
		}
			
	}
	
	function guardarMejora($idCompra,$idSession){
		$host = "localhost";
		$user = "valaryen";
		$pw = "passval";
		$db = "asterion";

		$con = mysqli_connect($host, $user, $pw, $db) or die("No se pudo conectar a la base de datos ");
		
		//echo"session". $idSession;
		//echo"session". $idCompra;
		
		$sqlBusqueda = "SELECT * FROM usuarioMejoras WHERE idUsuario=$idSession AND idMejoras=$idCompra";
		$resultado = mysqli_query($con,$sqlBusqueda);
		$row_cnt = mysqli_num_rows($resultado);
		
		$sqlBusquedaUsuario = "SELECT * FROM usuarioPersonaje WHERE idUsuario=$idSession";
		$resBusquedaUsuario = mysqli_query($con,$sqlBusquedaUsuario);
		$busquedaUsuario = mysqli_fetch_array($resBusquedaUsuario);
		
		$sqlMejoras = "SELECT * FROM mejoras WHERE id=$idCompra";
		$resMejoras = mysqli_query($con,$sqlMejoras);
		$mejora = mysqli_fetch_array($resMejoras);
		$total = $mejora[2];
		//echo"total".$total;
		
		
		if($row_cnt==0){//si la mejora es nueva, es decir, no encuentra filas en la tabla usuarioMejoras	
			if($total<=$busquedaUsuario['studys']){
				$sqlActualizarStudys = "UPDATE usuarioPersonaje  SET studys=studys-$mejora[3] WHERE idUsuario=$idSession";
				$resultado = mysqli_query($con,$sqlActualizarStudys);
				
				$sqlInsert="INSERT INTO usuarioMejoras VALUES('".$idSession."','".$idCompra."','1','$total')";
				$resInsertUsuarioMejoras = mysqli_query($con,$sqlInsert);
			}else{
				echo "<script language='JavaScript'>alert('No tienes suficientes studys');</script>";
			}
		}else{//sumamos una mejora
			if($total<=$busquedaUsuario['studys']){
				$sqlActualizarStudys = "UPDATE usuarioPersonaje  SET studys=studys-$mejora[3] WHERE idUsuario=$idSession";
				$resultado = mysqli_query($con,$sqlActualizarStudys);
				$sqlActualiza = "UPDATE usuarioMejoras  SET cantidad=cantidad+1, total=total+$total WHERE idUsuario=$idSession AND idMejoras=$idCompra";
				$resActualiza = mysqli_query($con,$sqlActualiza);
			}else{
				echo "<script language='JavaScript'>alert('No tienes suficientes studys');</script>";
			}
		}
		
	}
	
	
	
	
	
	
	
	
	
	
	
	
}
?>