<?php
  include_once '../config/mysqlconnect.php';

  $mysqli = new mysqli(host,usuario,clave,bdd);

  // Check connection
  if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

  $query = "SELECT * FROM examenes";

  $result= mysqli_query($mysqli, $query);
  ?>
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
    <div class="container">
        <h1>Laboratorio clinico</h1>

        <div class="row mt-4">
            <div class="col-12">
                <form method="POST" action="store_historias.php">
                    <div class="form-group">
                      <label for="Nombreexa">Tipo de examen</label>
                      <select name="Nombreexa" id="Nombreexa">
                        <?php while($row = mysqli_fetch_assoc($result))
                        {?>
                        <option value="<?php echo $row['Nombreexa'] ?>"><?php echo $row['Nombreexa'] ?></option>
                      <?php
                         }
                       mysqli_close($mysqli);
                      ?>
                        
                      </select>
                      <input type="hidden" name="cedulapac" value="<?php echo $_GET['cedulapac'] ?>">
                    </div>
                    
                    <div class="form-group">
                      <label for="fecha">Fecha</label>
                      <input type="date" class="form-control" id="fecha" name="fecha" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Registrar</button>

                  </form>            
              </div>
        </div>
    </div>
    <script src="../assets/js/jquery-3.5.1.slim.min.js"></script>
    <script src="../assets/bootstrap-4.5.3-dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>