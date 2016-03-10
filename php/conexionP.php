<?php
class conexionP{
	
	private function conexion(){
		$host = "localhost";
		$user = "root";
		$pw = "";		
		$db = "asterion";

		$con = mysqli_connect($host, $user, $pw, $db) or die("No se pudo conectar a la base de datos ");
		return $con;
	}
	



	function verificar_login($nombre,$pass){
		
		$con= $this->conexion();
		
		$sql= "SELECT * FROM user WHERE nombre='$nombre' AND pass='$pass'";
		$result=mysqli_query($con, $sql);
		$fila = mysqli_fetch_array($result);
		//echo "<script language='JavaScript'>alert('$fila[0]');</script>";
		$count = mysqli_num_rows($result);
		if($count == 1){
			session_start();
		     $_SESSION['loggedin'] = true;
			 $_SESSION['username'] = $nombre;
			 $_SESSION['start'] = time();
			 $_SESSION['expire'] = $_SESSION['start'] + (60 * 60) ;
			 $_SESSION['identificador']=$fila[0];
			 
			 //echo "Bienvenido! " . $_SESSION['username']. session_id();
			 //echo "<script language='JavaScript'>alert('asdasas');</script>";
			 
			 $this-> actualizarDinero($con);
			 
			 header("location:index.php");
		}else {
			echo "<script language='JavaScript'>alert('Username o Password son incorrectos.');</script>";
		}
		$con->close();
		
	}
	
	function registrarUsuario($nombre, $pass, $email){
		
		$con= $this->conexion();
		$sqlComprobacion= "SELECT * FROM user WHERE nombre='$nombre'";
		$result=mysqli_query($con, $sqlComprobacion);
		$count = mysqli_num_rows($result);
		if($count==0){
			$time=time();
		    $sql="INSERT INTO user VALUES('NULL','".$nombre."','".$pass."','".$email."','".$time."')";
			
			if (mysqli_query($con, $sql)) {
			    //echo "<script language='JavaScript'>alert('bien creado');</script>";
			    header("location:register.php");
			} else {
			    echo "Error: " . $sql . "<br>" . $con->error;
			    echo "<script language='JavaScript'>alert('mal creado');</script>";
			    header("location:register.php");
			}
		}else{
			echo "<script language='JavaScript'>alert('Elige otro nombre. Ya esta registrado');</script>";
		}
		$con->close();
	}


	function actualizarDinero($con){
		$tiempoActual=time();
		
		$sql = "SELECT *  FROM user WHERE id=".$_SESSION['identificador'];
		$ressql= mysqli_query($con,$sql);
		$res = mysqli_fetch_array($ressql);
		$tiempoGrabado = $res['tiempo'];
			
		$final = $tiempoActual-$tiempoGrabado;
		$final = ((($final/60)/60)/24);//segundos/minutos/horas 
		//$final = ($final/60); //para pruebas
		//echo"<br>".$final;
			
		if($final>=24){//$final>=1 para pruebas
			$sqlActualizar = "UPDATE user  SET tiempo=$tiempoActual WHERE id=".$_SESSION['identificador'];
			$resActualizar = mysqli_query($con,$sqlActualizar);
				
			$sqlActualizar2 = "UPDATE usuarioPersonaje  SET studys=studys+100 WHERE idUsuario=".$_SESSION['identificador'];
			$resActualizar2 = mysqli_query($con,$sqlActualizar2);
		}
		

	}
	
	
	
	/*
	function pruebaSqlite(){
		$bd = new SQLite3('database.sqlite');
					$sql ='SELECT * FROM personajes';
					$ret = $bd->query($sql);
					   while($row = $ret->fetchArray() ){
					      echo  "$row[0] ";
					      echo  "$row[1]<br>";
					   	}
					   	
						$bd = new SQLite3('database.sqlite');
					   	$sql1="INSERT INTO user (nombre, pass, mail) VALUES('asdasd','ddsss','asda')";
					   	$bd->query($sql1);
	}
	*/
	
	
}
?>