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
        
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <table class="table">
					  <thead>
					    <tr>
					      <th scope="col">Paciente</th>
					      <th scope="col">Fecha</th>
					      <th scope="col">Examen</th>
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

							$query = "SELECT * FROM resultados CROSS JOIN examenes";

							$result = mysqli_query($mysqli, $query);

							while($row = mysqli_fetch_assoc($result)) {

								echo "
									<tr>
										<td>" . $row["Nombre"] . "</td>
										<td>" . $row["Fecha"] . "</td>
										<td>" . $row["Nombreexa"]."</td>
								";
								?><td>
									<?php if($row["realizado"]==0)
									{
									?>
									<a href="subir-examen.php?id=<?php echo $row['ID']?>&nombre=<?php echo $row['Nombre']?> " class="btn btn-dark">Subir Datos de examen</a><?php
									}
									if($row["realizado"]>0)
									{
									?>
									<a href="reporte.php?id=<?php echo $row['ID']?>&nombre=<?php echo $row['Nombre']?>" class="btn btn-dark">enviar examen</a>
									<?php
									}
									?>
									</td>
									<?php
							}

							mysqli_close($mysqli);
					    ?>
					  </tbody>
					</table>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
			<a class="btn btn-primary" name="crear" href="examen.php">Crear registro de examen</a>
			<a class="btn btn-secondary" name="regresar" href="../index.html">Volver</a>
            </div>
    </div>
    <script src="../assets/js/jquery-3.5.1.slim.min.js"></script>
    <script src="../assets/bootstrap-4.5.3-dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>