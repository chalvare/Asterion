<?php
	
	session_start();
	if ($_FILES['archivo']["error"] > 0)
	  {
	  //echo "Error: " . $_FILES['archivo']['error'] . "<br>";
	  }
	else
	  {
	  echo "Nombre: " . $_FILES['archivo']['name'] . "<br>";
	  echo "Tipo: " . $_FILES['archivo']['type'] . "<br>";
	  echo "Tamaño: " . ($_FILES["archivo"]["size"] / 1024) . " kB<br>";
	  echo "Carpeta temporal: " . $_FILES['archivo']['tmp_name'];
	
	  echo"fileP ".$_FILES['archivo']['tmp_name'];
	  echo "images/usuarios/".$_SESSION['identificador'].".jpg";
	  /*ahora co la funcion move_uploaded_file lo guardaremos en el destino que queramos*/
	  move_uploaded_file($_FILES['archivo']['tmp_name'],"../images/usuarios/".$_SESSION['identificador'].".jpg");
	  header("location:../profile.php");
	  }
?>