<?php
class mejorasP{
	
	
	
	private function conexion(){
		$host = "localhost";
		$user = "root";
		$pw = "";
		$db = "asterion";

		$con = mysqli_connect($host, $user, $pw, $db) or die("No se pudo conectar a la base de datos ");
		return $con;
	}
	
	
	function mostrarMejoras(){
		$con= $this->conexion();
		
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
		$con= $this->conexion();
		
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
		$total = $mejora['precio'];
		//echo"total".$total;
		
		
		if($row_cnt==0){//si la mejora es nueva, es decir, no encuentra filas en la tabla usuarioMejoras	
			if($total<=$busquedaUsuario['studys']){
				$sqlActualizarStudys = "UPDATE usuarioPersonaje  SET studys=studys-$mejora[4] WHERE idUsuario=$idSession";
				$resultado = mysqli_query($con,$sqlActualizarStudys);
				
				$sqlInsert="INSERT INTO usuarioMejoras VALUES('".$idSession."','".$idCompra."','1','$mejora[3]')";
				$resInsertUsuarioMejoras = mysqli_query($con,$sqlInsert);
			}else{
				echo "<script language='JavaScript'>alert('No tienes suficientes studys');</script>";
			}
		}else{//sumamos una mejora
			if($total<=$busquedaUsuario['studys']){
				$sqlActualizarStudys = "UPDATE usuarioPersonaje  SET studys=studys-$mejora[4] WHERE idUsuario=$idSession";
				$resultado = mysqli_query($con,$sqlActualizarStudys);
				$sqlActualiza = "UPDATE usuarioMejoras  SET cantidad=cantidad+1, total=total+$mejora[3] WHERE idUsuario=$idSession AND idMejoras=$idCompra";
				$resActualiza = mysqli_query($con,$sqlActualiza);
			}else{
				echo "<script language='JavaScript'>alert('No tienes suficientes studys');</script>";
			}
		}
		
	}
	
	
	
	
}
?>	
	