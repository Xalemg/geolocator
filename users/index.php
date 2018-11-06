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
        <br>
        <h1>Aplicacion de geolocalicaciones</h1>
        <br/>
                <div class="row">
                    <div class="col-lg-7">
                        <h2>Usuarios</h2>
                        <table class="container">
                        <tr>
                          <th>Mail</th>
                          <th>Nombre</th>
                          <th>Apellidos</th>
                          <th>Edad</th>
                          <th>Resueltos</th>
                          <th>Acciones</th>
                        </tr>
                            <?php
                                require('../connection_info.php');
                                $link1 = new mysqli($dbhost, $dbuser ,$dbpass ,$dbname );
                                if($link1->connect_error) {
                                    echo "Error de conexion $link1->connect_errno";
                                    exit;
                                }
                                $query1 = $link1->query("SELECT
                                  mail, 
                                  firstName, 
                                  lastName, 
                                  age,
                                  record
                                   FROM users");
                                if( !$query1) {
                                    echo "Error en la query1 $link1->error";
                                    exit;
                                }
                                while ($row = $query1->fetch_assoc()) {
                                  $mail = $row["mail"];
                                  $firstName = $row["firstName"];
                                  $lastName = $row["lastName"];
                                  $age = $row["age"];
                                  $record = $row["record"];
                                    echo "<tr> 
                                    <td> $mail  </td>
                                    <td> $firstName  </td>
                                    <td> $lastName </td>
                                    <td> $age </td>
                                    <td> $record </td>  
                                    <td>".
                                    '<a href="delete_user.php?mail='.$mail.'"><img src="../resources/delete.png" height="24" width="24"></a>
                                    <a href="edit_user.php?mail='.$mail.'&firstName='
                                    .$firstName.'&lastName='
                                    .$lastName.'&age='
                                    .$age.'"><img src="../resources/edit.png" height="24" width="24"></a>'
                                    ."</td>
                                    </tr>";
                              }
                            ?>
                        </table>
                    </div>
                    <div class="col-lg-5">
                        <h2>Añadir usuario</h2>
                        <br/><br/>
                        <form action="add_user.php" method="post">
                        <h4>Datos de Usuario</h4>
                        <br/>
                        <?php
                            
                        echo<<<Group1

<div class="form-group row">
    <label for="email" class="col-sm-2 col-form-label">Email:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="mail" id="email" placeholder="Tu email">
    </div>
  </div>
  <br/>
  <div class="form-group row">
  <label for="locationName" class="col-sm-2 col-form-label">Nombre:</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" name="firstName" id="locationName" placeholder="Tu nombre">
  </div>
</div>
<div class="form-group row">
    <label for="apellidos" class="col-sm-2 col-form-label">Apellidos:</label>
    <div class="col-sm-10">
      <input type="text" step="any" class="form-control" name="lastName" id="apellidos" placeholder="Tus apellidos">
    </div>
  </div>
  <div class="form-group row">
    <label for="edad" class="col-sm-2 col-form-label">Edad:</label>
    <div class="col-sm-10">
      <input type="number" step="any" class="form-control" name="age" id="age" placeholder="Tu edad">
    </div>
  </div>
  <div class="form-group row">
  </div>
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Añadir Usuario</button>
    </div>
  </div>
Group1;

//Closing connections

        $query1->close();
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