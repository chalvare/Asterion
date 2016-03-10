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
		
		
		
		function mostrarAsignaturas($anyo){
			$con= $this->conexion();

			$query = "SELECT * FROM asignatura where anyo=$anyo";
			$resultado = mysqli_query($con,$query);
			
			switch($anyo){
				case 1:
					$anyoCardinal="Primero";
				break;
				case 2:
					$anyoCardinal="Segundo";
				break;
				case 3:
					$anyoCardinal="Tercero";
				break;
				case 4:
					$anyoCardinal="Cuarto";
				break;
				default:
				
			}
			
			
			if(mysqli_num_rows($resultado)>0){
				echo"<h1>$anyoCardinal</h1>";
				while ($fila = mysqli_fetch_array($resultado)) {
				$nombre=utf8_encode($fila['nombre']);
					
					echo"  <div class='col-sm-6 col-md-2'>";
					echo"    <div class='thumbnail'>";
					echo"      <img src='images/asignaturas/$fila[imagen].jpg' alt='' width='175' height='300'>";
					echo"      <div class='caption'>";
					echo"        <h4>$fila[acronimo]</h4>";
					echo"        <p>$nombre</p>";
					echo"        
								<div class='divform'>
								<form action='pagina.php' method='POST' class='form-horizontal formularioExamen'>
								<input type='submit'  class='btn btn-primary' name='submit' value='Examen'>
								</form>
								</div>";
					echo"      </div>";
					echo"    </div>";
					echo"  </div>";
					
				}
				
				 
				
				
				
					  //<button  id='botonComprar' type='button' class='btn btn-primary'>Compra</button>
				
			}else{
				die("no hay asignaturas que mostrar ");
			}
			$con->close();
				
		}
		
		
		
		
		
}

?>
