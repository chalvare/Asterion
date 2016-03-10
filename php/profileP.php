<?php
class profileP{
	
	private function conexion(){
		$host = "localhost";
		$user = "root";
		$pw = "";
		$db = "asterion";

		$con = mysqli_connect($host, $user, $pw, $db) or die("No se pudo conectar a la base de datos ");
		return $con;
	}
	
	function mostrarMejorasPersonaje($idSession){
		$con= $this->conexion();
				
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
	
	
	
	
	function cargarDatosPj($idUsuario){
		$con= $this->conexion();
		
		$sqlUsuarioPj = "SELECT * FROM usuarioPersonaje WHERE idUsuario=$idUsuario";
		$resUsuarioPj = mysqli_query($con, $sqlUsuarioPj);
		$row_cnt = mysqli_num_rows($resUsuarioPj);
		$usuarioPj = mysqli_fetch_array($resUsuarioPj);
		
		$sqlUsuario = "SELECT * FROM user WHERE id=$idUsuario";
		$resUsuario = mysqli_query($con, $sqlUsuario);
		$usuario = mysqli_fetch_array($resUsuario);
		
		if($row_cnt==0){
			echo"<p class='lead datosPerfil'> No has elegido personaje</p>";
			
		}else{
			echo"<p class='lead datosPerfil'> ".$usuario['nombre']."</p>";
			echo"<p class='lead'>Nivel: ". $usuarioPj['nivel']."</p>";  
			echo"<p class='lead'>Studys: ". $usuarioPj['studys']. "</p>";
			
			$sqlPersonaje = "SELECT * FROM personajes WHERE id=".$usuarioPj['idPersonaje'];
			$resPersonaje = mysqli_query($con, $sqlPersonaje);
			$personaje = mysqli_fetch_array($resPersonaje);
			
			$sqlMejorado = "SELECT * FROM usuarioMejoras WHERE idUsuario=".$usuarioPj['idPersonaje'];
			$resMejorado = mysqli_query($con, $sqlMejorado);
			
			
			$inteligencia = $personaje['inteligencia'];
			$tecnicas = $personaje['tecnicas'];
			$grupo = $personaje['grupo'];	  
			$constancia = $personaje['constancia'];
			$estudio = $personaje['estudio'];  
			$suerte = $personaje['suerte'];	  
			
			
			while($mejorado = mysqli_fetch_array($resMejorado)){
				if($mejorado['tipoMejora']==1){
					$inteligencia = $personaje['inteligencia'] + ($personaje['inteligencia'] * $mejorado['total']);
					
				}
				if($mejorado['tipoMejora']==2){
					$tecnicas = $personaje['tecnicas'] + ($personaje['tecnicas'] * $mejorado['total']);
					
				}
				if($mejorado['tipoMejora']==3){
					$grupo = $personaje['grupo'] + ($personaje['grupo'] * $mejorado['total']);
					
				}
				if($mejorado['tipoMejora']==4){
					$constancia = $personaje['constancia'] + ($personaje['constancia'] * $mejorado['total']);
					
				}
				if($mejorado['tipoMejora']==5){
					$estudio = $personaje['estudio'] + ($personaje['estudio'] * $mejorado['total']);
					
				}
				if($mejorado['tipoMejora']==6){
					$suerte = $personaje['suerte'] + ($personaje['suerte'] * $mejorado['total']);
					
				}	
			}	
			
			echo "<div class='table-responsive'>";
				echo "<table class='table caracteristicas'>";
					echo "<thead>";
						echo "<tr>";
							echo "<th>".$personaje['nombre']."</th>";
							echo "<th>Valor</th>";
						echo "</tr>";
					echo "</thead>";
					echo "<tbody>";
					 // <!-- Aplicadas en las filas -->
					  echo "<tr class='info'>";
						echo "<td >Inteligencia</td>";
					    echo "<td >".$inteligencia."</td>";
					  echo "</tr>";
					  echo "<tr class='info'>";
						echo "<td>Técnicas</td>";
					    echo "<td>".$tecnicas."</td>";
					  echo "</tr>";
					  echo "<tr class='info'>";
						echo "<td>Grupo</td>";
					    echo "<td>".$grupo."</td>";
					  echo "</tr>";
					  echo "<tr class='info'>";
						echo "<td>Constancia</td>";
					    echo "<td>".$constancia."</td>";
					  echo "</tr>";
					  echo "<tr class='info'>";
						echo "<td>Estudio</td>";
					    echo "<td>".$estudio."</td>";
					  echo "</tr>";
					  echo "<tr class='info'>";
						echo "<td >Suerte</td>";
					    echo "<td >".$suerte."</td>";
					  echo "</tr>";
					echo "</tbody>";
				echo "</table>";
			echo "</div>";//fin table-responsive
			
			
			

		}
		
	}
	
	function cargarImagen($idUsuario){
		$con= $this->conexion();
		
		$sqlUsuarioPj = "SELECT * FROM usuarioPersonaje, personajes WHERE usuarioPersonaje.idUsuario=$idUsuario AND usuarioPersonaje.idPersonaje=personajes.id";
		$resUsuarioPj = mysqli_query($con, $sqlUsuarioPj);
		$numFilas = mysqli_num_rows($resUsuarioPj);
		
		if($numFilas==1){//si ya se ha elegido pj
			$usuarioPj = mysqli_fetch_array($resUsuarioPj);
			echo"<img src='images/personajes/".$usuarioPj['imagen'].".jpg' class='img-rounded img-responsive' width='262' height='450'>";
		}else{//si no se ha elegido personaje.
			$this->elegirPersonaje($idUsuario, $con);
		}
		$con->close();
	}
	
	function elegirPersonaje($idUsuario, $con){
		
		echo"<form role='form' action='' METHOD='post' class='form-inline'";
			echo"<h2><span class='label'>Personaje: </span></h2>";
					echo"<select id='selPj' class='form-control' name='pjs'>";
					echo"<option value='0'></option>";
					echo"<option value='1'>Crusader</option>";
					echo"<option value='2'>Ranger</option>";
					echo"<option value='3'>Archer</option>";
					echo"<option value='4'>Warrior</option>";
					echo"<option value='5'>Mage</option>";
					echo"<option value='6'>Elemental</option>";
					echo"</select>";
					echo"<input type='submit' name='submitElegirPJ' value='Seleccionar' class='btn btn-primary btSeparacion'>  ";

		echo"</form>";
		
		if(isset($_POST['submitElegirPJ'])){
			//echo "<script language='JavaScript'>alert('asdasas');</script>";
			$eleccionPj = $_POST['pjs'];
			$sqlInsert = "INSERT INTO usuarioPersonaje VALUES('".$_SESSION['identificador']."','".$eleccionPj."',1,0,1000)";
			$resInsert = mysqli_query($con, $sqlInsert);
			printf("<script>location.href='profile.php'</script>");

		}
		
		
	}
	
	
	function cargarImagenUsuario(){
		$con= $this->conexion();
		
		$nombre_fichero = 'images/usuarios/'.$_SESSION['identificador'].'.jpg';
		if (file_exists($nombre_fichero)) {
		   echo"<img src=images/usuarios/".$_SESSION['identificador'].".jpg class='img-circle' width='250' height='250'>";
		} else {
		    echo"<img src=images/usuarios/noimage.jpg class='img-circle' width='250' height='250'>";
		}
		$con->close();
	}
	
	
	
}

?>