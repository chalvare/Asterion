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
				  echo"<th>Mejora</th>";
				  echo"<th>Precio</th>";
				  echo"<th>Comprar</th>";
				  while ($fila = mysqli_fetch_array($resultado)) {
						echo " <tr>";
						echo "<td> ".utf8_encode($fila['nombre'])."  </td> <td> $fila[valor] </td><td>".utf8_encode($fila['tipo'])."</td><td>$fila[precio] Studys</td> 
						<td>
						
						<form id='formMejoras' action='mejoras.php' method='post' role='form'>
							<input type='hidden' value='$fila[id]' name='idCompra'>
							<input id='btnCompra' type='submit' name='submitMejora' value='Comprar' class='btn btn-primary'>
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
		$resultado=0;
		
		if($row_cnt==0){//si la mejora es nueva, es decir, no encuentra filas en la tabla usuarioMejoras
			if($total<=$busquedaUsuario['studys']){
				$sqlActualizarStudys = "UPDATE usuarioPersonaje  SET studys=studys-".$mejora['precio']." WHERE idUsuario=$idSession";
				$resultado = mysqli_query($con,$sqlActualizarStudys);
				
				$sqlInsert="INSERT INTO usuarioMejoras VALUES('".$idSession."','".$idCompra."','1','".$mejora['valor']."','".$mejora['caracteristica']."')";
				$resInsertUsuarioMejoras = mysqli_query($con,$sqlInsert);
				$this->insertarUsuarioPersonaje($con,$idSession, $mejora['caracteristica'], $mejora['valor']);
				$resultado=1;
			}else{
				echo "<script language='JavaScript'>alert('No tienes suficientes studys');</script>";
			}
		}else{//sumamos una mejora
			if($total<=$busquedaUsuario['studys']){
				$sqlActualizarStudys = "UPDATE usuarioPersonaje  SET studys=studys-".$mejora['precio']." WHERE idUsuario=$idSession";
				$resultado = mysqli_query($con,$sqlActualizarStudys);
				$sqlActualiza = "UPDATE usuarioMejoras  SET cantidad=cantidad+1, total=total+".$mejora['valor']." WHERE idUsuario=$idSession AND idMejoras=$idCompra";
				$resActualiza = mysqli_query($con,$sqlActualiza);
				
				$this->insertarUsuarioPersonaje($con,$idSession, $mejora['caracteristica'], $mejora['valor']);
				$resultado=1;
			}else{
				echo "<script language='JavaScript'>alert('No tienes suficientes studys');</script>";
			}
		}
		return $resultado;
		
	}
	
	function insertarUsuarioPersonaje($con, $idUsuario, $mejora, $valor){//la id del usuario y la característica a mejorar de la tabla usuarioMejoras
				
			
		
			$sqlMejorado = "SELECT * FROM usuarioMejoras WHERE idUsuario=".$idUsuario;
			$resMejorado = mysqli_query($con, $sqlMejorado);
			
			
			$sqlPersonaje = "SELECT * FROM personajes, usuarioPersonaje WHERE usuarioPersonaje.idUsuario=$idUsuario AND usuarioPersonaje.idPersonaje=personajes.id";
			$resPersonaje = mysqli_query($con, $sqlPersonaje);
			$personaje = mysqli_fetch_array($resPersonaje);
			
			$inteligencia = $personaje['inteligencia'];
			$tecnicas = $personaje['tecnicas'];
			$grupo = $personaje['grupo'];	  
			$constancia = $personaje['constancia'];
			$estudio = $personaje['estudio'];  
			$suerte = $personaje['suerte'];	  
			
			
			//while($mejorado = mysqli_fetch_array($resMejorado)){
				if(/*$mejorado['tipoMejora']==1*/$mejora==1){
					echo "<script language='JavaScript'>alert('entramos1');</script>";
					$inteligencia = $personaje['inteligencia'] + ($personaje['inteligencia'] * $valor);
					
				}
				if($mejora==2){
					echo "<script language='JavaScript'>alert('entramos2');</script>";
					$tecnicas = $personaje['tecnicas'] + ($personaje['tecnicas'] * $valor);
					
				}
				if($mejora==3){
					echo "<script language='JavaScript'>alert('entramos3');</script>";
					$grupo = $personaje['grupo'] + ($personaje['grupo'] * $valor);
					
				}
				if($mejora==4){
					echo "<script language='JavaScript'>alert('entramos4');</script>";
					$constancia = $personaje['constancia'] + ($personaje['constancia'] * $valor);
					
				}
				if($mejora==5){
					echo "<script language='JavaScript'>alert('entramos5');</script>";
					$estudio = $personaje['estudio'] + ($personaje['estudio'] * $valor);
					
				}
				if($mejora==6){
					echo "<script language='JavaScript'>alert('entramos6');</script>";
					$suerte = $personaje['suerte'] + ($personaje['suerte'] * $valor);
					
				}			
		//}
		
		$sqlCaracteristicasActualizadas="UPDATE usuarioPersonaje SET inteligencia=$inteligencia, tecnicas=$tecnicas, grupo=$grupo, constancia=$constancia, estudio=$estudio, suerte=$suerte   WHERE idUsuario=$idUsuario";
		$resCaracteristicasActualizadas = mysqli_query($con, $sqlCaracteristicasActualizadas);
		
		
		
		
	}
	
	
	
	
}
?>	
	