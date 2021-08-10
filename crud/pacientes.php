<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="../assets/bootstrap-4.5.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/estilos.css?v=<?php echo time(); ?>">
    <title>Actividad Laboratorio</title>
  </head>
  <body>
	  <h1>Laboratorio clinico</h1>
    <div class="container">		
        <div class="row mt-4">
            <div class="col-12">
                <table class="table">
					  <thead>
					    <tr>
					      <th scope="col">Cedula</th>
					      <th scope="col">Nombre</th>
					      <th scope="col">Edad</th>
					      <th scope="col">Correo</th>
					      <th scope="col">Telefono</th>
					      <th scope="col">Dirección</th>
						  <th scope="col">Genero</th>
						  <th scope="col">Tipo de sangre</th>
					    </tr>
					  </thead>
					  <tbody>
					    <?php
					    	include_once '../config/mysqlconnect.php';

							$mysqli = new mysqli(host,usuario,clave,bdd);

							// Check connection
							if ($mysqli -> connect_errno) {
  							echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
 							exit();
							}


							$query = "SELECT * FROM pacientes";

							$result = mysqli_query($mysqli, $query);


							while($row = mysqli_fetch_assoc($result)) {
								echo "
									<tr>
										<td>" . $row["Cedula"] . "</td>
										<td>" . $row["Nombre"] . "</td>
										<td>" . $row["Edad"] . "</td>
										<td>" . $row["Correo"] . "</td>
										<td>" . $row["Telefono"] . "</td>
										<td>" . $row["Direccion"] . "</td>
										<td>" . $row["Genero"] . "</td>
										<td>" . $row["Sangre"] . "</td>
									</tr>
								";
							}

							mysqli_close($mysqli);
					    ?>
					  </tbody>
					</table>
            </div>
        </div>
		<div class="row mt-4">
            <div class="col-12">
				<a class="btn btn-primary" name="crear" href="guardarpac.php">Crear registro de paciente</a>
				<a class="btn btn-primary" name="crear" href="correo.php">Enviar correo con resultados</a>
                <a class="btn btn-primary" name="crear" href="../index.html">Volver</a>
            </div>
        </div>
    </div>
    <script src="../assets/js/jquery-3.5.1.slim.min.js"></script>
    <script src="../assets/bootstrap-4.5.3-dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>