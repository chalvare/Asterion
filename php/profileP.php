<?php
class profileP{
	
	
	function mostrarMejorasPersonaje($idSession){
		$host = "localhost";
		$user = "valaryen";
		$pw = "passval";
		$db = "asterion";

		$con = mysqli_connect($host, $user, $pw, $db) or die("No se pudo conectar a la base de datos ");
		
		$sqlBuscarMejorasUsuario = "SELECT * FROM usuarioMejoras WHERE idUsuario=$idSession";
		$resBuscarMejorasUsuario = mysqli_query($con, $sqlBuscarMejorasUsuario);
		$row_cnt = mysqli_num_rows($resBuscarMejorasUsuario);
		
		if($row_cnt!=0){
			while($fila = mysqli_fetch_array($resBuscarMejorasUsuario)){
				$sqlDatosMejora="SELECT * FROM mejoras WHERE id=$fila[1]";
				$resDatosMejora=mysqli_query($con, $sqlDatosMejora);
				$datosMejora = mysqli_fetch_array($resDatosMejora);
				echo"<tr>";
				echo"<td>". utf8_encode($datosMejora[1])."</td>";
				echo"<td>". utf8_encode($datosMejora[2])."</td>";
				echo"<td>$datosMejora[3]</td>";
				echo"<td>$fila[2]</td>";
				echo"<td>$fila[3]</td>";
				echo"</tr>";
			}
		}else{
			echo"<tr><td>El personaje no tiene mejoras</td></tr>";
		}
		
		
	$con->close();	
	}
	
	
	
}

?>