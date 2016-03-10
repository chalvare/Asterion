<?php	
class asignaturasP{
	private function conexion(){
			$host = "localhost";
			$user = "root";
			$pw = "";
			$db = "asterion";
	
			$con = mysqli_connect($host, $user, $pw, $db) or die("No se pudo conectar a la base de datos ");
			return $con;
		}
		
		
		function mostrarAsignaturas(){
			$con= $this->conexion();
			
			$query = "SELECT * FROM asignatura";
			$resultado = mysqli_query($con,$query);
			
			if(mysqli_num_rows($resultado)>0){
				echo"<div class='table-responsive'>";
					  echo"<table id='tablaMejoras' class='table tablaAsignaturas'>";
					  echo"<th>Nombre</th>";
					  echo"<th>Incremento</th>";
					  echo"<th>Precio</th>";
					  echo"<th>Comprar</th>";
					  echo"<th>Precio</th>";
					  echo"<th>Comprar</th>";
					  echo"<th>Comprar</th>";
					  while ($fila = mysqli_fetch_array($resultado)) {
						  $nombre=utf8_encode($fila['nombre']);
							echo " <tr>";
							echo "<td>$nombre </td> <td> $fila[creditos] </td><td>$fila[anyo] Studys</td> 
							<td>$fila[dificultad] Studys</td> <td>$fila[imagen] Studys</td> <td>$fila[precio] Studys</td> 
							<td>
							
							<form id='formAsignaturas' action='asignaturas.php' method='post' role='form'>
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
}

?>
