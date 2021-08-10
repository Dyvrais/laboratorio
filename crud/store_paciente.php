<?php
	include_once '../config/mysqlconnect.php';

	$Cedula = $_REQUEST["cedula"];
	$Nombre = $_REQUEST["nombre"];
	$Edad = $_REQUEST["edad"];
	$Correo = $_REQUEST["correo"];
	$Telefono = $_REQUEST["telefono"];
	$Direccion = $_REQUEST["direccion"];
	$Genero = $_REQUEST["genero"];
	$Sangre = $_REQUEST["sangre"];

	include_once '../config/mysqlconnect.php';

		$mysqli = new mysqli(host,usuario,clave,bdd);

		// Check connection
		if ($mysqli -> connect_errno) {
  		echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
 		exit();
		}

	$query = "INSERT INTO pacientes (cedula, nombre, edad, correo, telefono, direccion, genero, sangre) VALUES ('" . $Cedula . "', '". $Nombre ."', '" . $Edad . "', '". $Correo ."', '". $Telefono ."', '". $Direccion ."', '". $Genero ."', '". $Sangre ."')";

	mysqli_query($mysqli, $query);

	mysqli_close($mysqli);
?>

<script>
	window.location.href = 'pacientes.php';
</script>