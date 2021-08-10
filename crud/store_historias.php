<?php
	include_once '../config/mysqlconnect.php';

	$Nombre = $_POST["Nombreexa"];
	$cedulapac = $_POST["cedulapac"];
	$Fecha = $_POST["fecha"];
	

	include_once '../config/mysqlconnect.php';

		$mysqli = new mysqli(host,usuario,clave,bdd);

		// Check connection
		if ($mysqli -> connect_errno) {
  		echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
 		exit();
		}

	$query = "INSERT INTO resultados (cedulapac, fecha, nombreexa) VALUES ('" . $cedulapac . "', '". $Fecha ."','".$Nombre."')";

	mysqli_query($mysqli, $query);

	mysqli_close($mysqli);
?>

<script>
	window.location.href = 'tablaexamen.php';
</script>