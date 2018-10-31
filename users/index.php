<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Proyecto de Geolocalización</title>
    <!--BOOTSTRAP IMPORT-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
    <!--NAV START-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="../">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href=".">Usuarios</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../locations">Localizaciones</a>
      </li>
    </ul>
  </div>
</nav>
    <!--NAV END-->
    <!--MAIN START-->
    <div class="main">
        <div class="container-fluid">
        <h1>Aplicacion de geolocalicaciones</h1>
        <br/>
                <div class="row">
                    <div class="col-lg-7">
                        <h2>Localizaciones</h2>
                        <table class="container">
                        <tr>
                          <th>Nombre</th>
                          <th>Longitud</th>
                          <th>Latitud</th>
                          <th>Altitud</th>
                          <th>Fecha</th>
                          <th>Acciones</th>
                        </tr>
                            <?php
                                require('../connection_info.php');
                                $link1 = new mysqli($dbhost, $dbuser ,$dbpass ,$dbname );
                                if($link1->connect_error) {
                                    echo "Error de conexion $link1->connect_errno";
                                    exit;
                                }
                                $query1 = $link1->query("SELECT createdBy,
                                 nombre, 
                                  locationDate, 
                                  longitud, 
                                  latitud, 
                                  altitud, 
                                  solvedBy
                                   FROM locations");
                                if( !$query1) {
                                    echo "Error en la query1 $link1->error";
                                    exit;
                                }
                                while ($row = $query1->fetch_assoc()) {
                                  $nombre = $row["nombre"];
                                  $locationDate = $row["locationDate"];
                                  $longitud = $row["longitud"];
                                  $latitud = $row["latitud"];
                                  $altitud = $row["altitud"];
                                  $solvedBy = $row["solvedBy"];
                                  if($solvedBy==null) {
                                    echo "<tr> 
                                    <td> $nombre </td>
                                    <td> $longitud  </td>
                                    <td> $latitud </td>
                                    <td> $altitud </td>
                                    <td> $locationDate </td>  
                                    </tr>";
                                  }
                              }
                            ?>
                        </table>
                    </div>
                    <div class="col-lg-5">
                        <h2>Añadir localización</h2>
                        <br/><br/>
                        <form action="add_location.php">
                        <h4>Datos de Usuario</h4>
                        <br/>
                        <?php
                            
                        echo<<<Group1

<div class="form-group row">
    <label for="email" class="col-sm-2 col-form-label">Email:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="email" placeholder="Email del usuario">
    </div>
  </div>
  <h4>Datos de la localización</h4>
  <br/>
  <div class="form-group row">
  <label for="locationName" class="col-sm-2 col-form-label">Nombre:</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" id="locationName" placeholder="Nombra la localización">
  </div>
</div>
<div class="form-group row">
    <label for="latitud" class="col-sm-2 col-form-label">Latitud:</label>
    <div class="col-sm-10">
      <input type="number" step="any" class="form-control" id="latitud" placeholder="Latitud del sitio">
    </div>
  </div>
  <div class="form-group row">
    <label for="longitud" class="col-sm-2 col-form-label">Longitud:</label>
    <div class="col-sm-10">
      <input type="number" step="any" class="form-control" id="longitud" placeholder="Longitud del sitio">
    </div>
  </div>
  <div class="form-group row">
    <label for="altura" class="col-sm-2 col-form-label">Altura:</label>
    <div class="col-sm-10">
      <input type="number" step="any" class="form-control" id="altura" placeholder="Altura del sitio">
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Añadir Geolocalizacion</button>
    </div>
  </div>
Group1;

//Closing connections

        $query1->close();
            $query2->close();

            $link1->close();
?>
                        </form>
                    </div>
                </div>
        </div>

    </div>
        <!--MAIN END-->
</body>
</html>