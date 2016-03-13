<?php
	class examenP{
	
	private function conexion(){
		$host = "localhost";
		$user = "root";
		$pw = "";		
		$db = "asterion";

		$con = mysqli_connect($host, $user, $pw, $db) or die("No se pudo conectar a la base de datos ");
		return $con;
	}
	

	function calcularResultado($idUsuario){
		
		$con=$this->conexion();
		$sqlRecuperarPersonaje= "SELECT * FROM usuarioPersonaje WHERE idUsuario='$idUsuario'";
		$resRecuperarPersonaje = mysqli_query($con, $sqlRecuperarPersonaje);
		$recuperarPersonaje = mysqli_fetch_array($resRecuperarPersonaje);
		
		$media=($recuperarPersonaje['inteligencia']+$recuperarPersonaje['tecnicas']+$recuperarPersonaje['grupo']+$recuperarPersonaje['constancia']+$recuperarPersonaje['estudio']+$recuperarPersonaje['suerte'])/6;
		echo"asasdasd".$media;
		
		
		
	}


	
}
?>