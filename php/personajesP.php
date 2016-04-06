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
		echo "<div class='col-sm-6'>";
        echo "<img src='images/personajes/$fila[0].jpg' class='img-rounded img-responsive imagepj' alt='$fila[1]' width='346' height='600'>";
        echo "</div>";
		
		return $fila;

	}

	function mostrarPersonaje($personaje){
		$texto=utf8_encode($personaje[9]);
		echo "<h3>$personaje[1]</h3><p class='textoPersonaje'> $texto </p>";
		echo "<div class='table-responsive'>";
			echo "<table class='table caracteristicas'>";
				echo "<thead>";
					echo "<tr>";
					echo "<th>$personaje[1]</th>";
					echo "<th>Valor</th>";
					echo "</tr>";
				echo "</thead>";
				echo "<tbody>";
				// <!-- Aplicadas en las filas -->
					echo "<tr class='info'>";
						echo "<td>Inteligencia</td>";
						echo "<td>$personaje[2]</td>";
					echo "</tr>";
					echo "<tr class='info'>";
						echo "<td>Técnicas</td>";
						echo "<td>$personaje[3]</td>";
					echo "</tr>";
					echo "<tr class='info'>";
						echo "<td>Grupo</td>";
						echo "<td>$personaje[4]</td>";
					echo "</tr>";
					echo "<tr class='info'>";
						echo "<td>Constancia</td>";
						echo "<td>$personaje[5]</td>";
					echo "</tr>";
					echo "<tr class='info'>";
						echo "<td>Estudio</td>";
						echo "<td>$personaje[6]</td>";
					echo "</tr>";
					echo "<tr class='info'>";
						echo "<td >Suerte</td>";
						echo "<td >$personaje[7]</td>";
					echo "</tr>";
				echo "</tbody>";
			echo "</table>";
		echo "</div>";

	}
	
}

?>