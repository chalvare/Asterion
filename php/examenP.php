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
	

	function calcularResultado($idUsuario,$idAsig,$dificultad,$examen, $precio){
		
		$con=$this->conexion();
		$sqlRecuperarPersonaje= "SELECT * FROM usuarioPersonaje WHERE idUsuario='$idUsuario'";
		$resRecuperarPersonaje = mysqli_query($con, $sqlRecuperarPersonaje);
		$recuperarPersonaje = mysqli_fetch_array($resRecuperarPersonaje);
		
		
		$this->restarStudys($con, $recuperarPersonaje, $precio, $idAsig);
		
		
		$media=($recuperarPersonaje['inteligencia']+$recuperarPersonaje['tecnicas']+$recuperarPersonaje['grupo']+$recuperarPersonaje['constancia']+$recuperarPersonaje['estudio']+$recuperarPersonaje['suerte'])/6;
		
		$randomA =(mt_rand(0,100)/100);
		$randomD =(mt_rand(0,100)/100);
		$defensa = ($examen * $randomD) + $dificultad;
		
		$ataque = $media*$randomA+($recuperarPersonaje['nivel']/25);
		
		/*echo"<br>examen ".$examen;
		echo"<br>random ".$randomD;
		echo"<br>dif ".$dificultad;
		echo"<br>defensa ".$defensa;
		
		echo"<br><br>media ".$media;
		echo"<br>randomA ".$randomA;
		echo"<br>nivel ".$recuperarPersonaje['nivel']/25;
		echo"<br>ataque ".$ataque;
		*/
		
		$con->close();
		if($ataque>$defensa){
			return $ataque;
		}else{
			return 0;
		}
		
		
		
	}


	function guardarUsuarioAsignatura($idAsignatura, $aprobado ,$nota, $anyo){
		$con=$this->conexion();
		$sqlBusAsig = "SELECT * FROM usuarioAsignatura WHERE idUsuario=".$_SESSION['identificador']." AND idAsignatura=".$idAsignatura;
		$resBusAsig = mysqli_query($con, $sqlBusAsig);
		$numFilas = mysqli_num_rows($resBusAsig);
		$busAsig = mysqli_fetch_array($resBusAsig);
		if($numFilas==0){//es primera matricula. Insertamos
			$sqlInsert ="INSERT INTO usuarioAsignatura VALUES('".$_SESSION['identificador']."','".$idAsignatura."','".$aprobado."','".$nota."','1','".$anyo."')";
			$resInsert=mysqli_query($con, $sqlInsert);
		}else{//no es primera matricula. ACtualizamos a + 1 
			//echo "<script language='JavaScript'>alert('elseeee examenp');</script>";
			if($busAsig['matricula']<3){
				$sqlUpdate ="UPDATE usuarioAsignatura SET matricula=matricula+1, aprobado=$aprobado,nota=$nota WHERE idUsuario=".$_SESSION['identificador']." AND idAsignatura=".$idAsignatura;
				$resUpdate=mysqli_query($con, $sqlUpdate);
			}else{
				$sqlUpdate ="UPDATE usuarioAsignatura SET aprobado=$aprobado,nota=$nota WHERE idUsuario=".$_SESSION['identificador']." AND idAsignatura=".$idAsignatura;
				$resUpdate=mysqli_query($con, $sqlUpdate);
			}
		}
		$con->close();
		
	}

	function restarStudys($con, $recuperarPersonaje, $precio, $idAsignatura){
		
		$sqlBusAsig = "SELECT * FROM usuarioAsignatura WHERE idUsuario=".$_SESSION['identificador']." AND idAsignatura=".$idAsignatura;
		$resBusAsig = mysqli_query($con, $sqlBusAsig);
		$busAsig = mysqli_fetch_array($resBusAsig);
		
		$total;
		if($busAsig['matricula']!=0){
			$total = $precio * ($busAsig['matricula']+1);
		}else{
			$total = $precio;
		}
		//echo "<script language='JavaScript'>alert('resta $total');</script>";
		$sqlActualizarStudys = "UPDATE usuarioPersonaje SET studys=studys-$total WHERE idUsuario=".$recuperarPersonaje['idUsuario'];
		$resActualizarStudys = mysqli_query($con, $sqlActualizarStudys);
		
	}
	
	function sumarStudys($idUsuario, $precio){
		$con=$this->conexion();
		//echo "<script language='JavaScript'>alert('suma  $precio');</script>";
		$sqlActualizarStudys = "UPDATE usuarioPersonaje SET studys=studys+$precio WHERE idUsuario=".$idUsuario;
		$resActualizarStudys = mysqli_query($con, $sqlActualizarStudys);
		$con->close();
	}
	
	
	function calcularNivel($idUsuario, $nota, $creditos){
		$con=$this->conexion();
		
		$res = (($creditos*100)/240)*($nota/10);
		$res = round($res);
		//echo "<script language='JavaScript'>alert('suma  $res');</script>";
		$sqlNivel = "UPDATE usuarioPersonaje SET nivel=nivel+$res WHERE idUsuario=".$idUsuario;
		$resNivel = mysqli_query($con, $sqlNivel);
		$con->close();
	}
	
	
	
	
	
	
	
	
}
?>