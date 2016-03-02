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