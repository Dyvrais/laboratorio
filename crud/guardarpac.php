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
                <form method="POST" action="guardarpac.php">
                    <div class="form-group">
                      <label for="cedula">Cedula</label>
                      <input type="text" class="form-control" id="cedula" name="cedula" required>
                    </div>

                    <div class="form-group">
                      <label for="nombre">Nombre</label>
                      <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>

                    <div class="form-group">
                      <label for="edad">Edad</label>
                      <input type="number" min="1" max="100" class="form-control" id="edad" name="edad" required>
                    </div>

                    <div class="form-group">
                      <label for="correo">Correo</label>
                      <input type="email" class="form-control" id="correo" name="correo" required>
                    </div>

                    <div class="form-group">
                      <label for="telefono">Numero de Telefono</label>
                      <input type="text" class="form-control" id="telefono" name="telefono" required>
                    </div>

                    <div class="form-group">
                      <label for="direccion">Direccion</label>
                      <textarea class="form-control" id="direccion" name="direccion" rows="3" required></textarea>
                    </div>

                    <div class="form-group">
                      <label for="genero">Genero</label>
                      <input type="text" class="form-control" id="genero" name="genero" required>
                    </div>

                    <div class="form-group">
                      <label for="sangre">Tipo de sangre</label>
                      <input type="text" class="form-control" id="sangre" name="sangre" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Registrar</button>

                    <a class="btn btn-secondary" name="regresar" href="pacientes.php">Regresar</a>
                    
                  </form>            
              </div>
        </div>
    </div>
    <script src="../assets/js/jquery-3.5.1.slim.min.js"></script>
    <script src="../assets/bootstrap-4.5.3-dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>