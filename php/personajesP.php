<?php
class personajesP{



private function conexion(){
		$host = "localhost";
		$user = "root";
		$pw = "";		
		$db = "asterion";

		$con = mysqli_connect($host, $user, $pw, $db) or die("No se pudo conectar a la base de datos ");
		return $con;
	}
	
function recuperarPersonaje($pjs){
		$con= $this->conexion();
		
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
	
}

?>