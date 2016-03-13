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
				echo"       <h4>$fila[acronimo]</h4>";
				echo"       <p>$nombre</p>";
					$this->crearModal($nombre, $fila['id'], $fila);
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


	function crearModal($nombre, $id, $fila){
		echo"<a href='#myModal$id' class='btn btn-primary' data-toggle='modal'>Examen</a>
			<div id='myModal$id' class='modal fade'>
				<div class='modal-dialog'>
				<div class='modal-content'>
	                <div class='modal-header'>
	                    <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
	                    <h4 class='modal-title'>$nombre</h4>
	                </div>
	                <div class='modal-body alturaModalWindow'>
	                    <p>¿Estas seguro de que quieres examinarte de esta asignatura?</p>
	                    <div  class='col-md-2 pull-left'>
	                    	<img src='images/asignaturas/$fila[imagen].jpg' alt='' width='88' height='150'>
						</div>	
						<div  class='col-md-8 pull-right'>
	                    	<p class='datosAsig'>Créditos: $fila[creditos]</p>
							<p class='datosAsig'>Año: $fila[anyo]</p>
							<p class='datosAsig'>Dificultad Asignatura: $fila[dificultad]</p>
							<p class='datosAsig'>Studys: $fila[precio]</p>
							<p class='datosAsig'> Dificultad Examen: $fila[examen]</p>
						</div>	
	                </div>
	                <div class='modal-footer'>
		                <div class='divform'>
							<form action='examen.php' method='POST' class='form-horizontal formularioExamen'>
							<input type='hidden' value='$id' name='idAsig'>
							<input type='hidden' value='$fila[dificultad]' name='dificultad'>
							<input type='hidden' value='$fila[examen]' name='examen'>
							<button type='button' class='btn btn-default' data-dismiss='modal'>Cerrar</button>
							<input type='submit'  class='btn btn-primary' name='submit' value='Examinar'>
							</form>
		                </div>
	            </div>
	        </div>
			</div>
		</div>";
	}


	function prueba(){
		if(isset($_POST['submit'])){
			$ida = $_POST['idAsig'];
			echo"idaaaa: ".$ida;
			
		}else{
			echo"noooooo: ";
		}

	}




}

?>
