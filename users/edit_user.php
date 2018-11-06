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
<br>
<main>
<div>

<h1>Editar usuario</h1>
                        <br/><br/>
                        <form action="commit_user_update.php" method="post">
                        <h4>Datos de Usuario</h4>
                        <br/>
                        <?php
                            if($_GET) {
                                $mail= $_GET['mail'];
                                $firstName= $_GET['firstName'];
                                $lastName= $_GET['lastName'];
                                $age= $_GET['age'];
                        echo<<<Group1
<div class="form-group row">
    <label for="email" class="col-sm-2 col-form-label">Email:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="mail" id="email" disabled value="$mail">
      <input type="text" class="form-control" name="mail" id="email" hidden value="$mail">
    </div>
  </div>
  <br/>
  <div class="form-group row">
  <label for="locationName" class="col-sm-2 col-form-label">Nombre:</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" name="firstName" id="locationName"  value="$firstName">
  </div>
</div>
<div class="form-group row">
    <label for="apellidos" class="col-sm-2 col-form-label">Apellidos:</label>
    <div class="col-sm-10">
      <input type="text" step="any" class="form-control" name="lastName" id="apellidos" value="$lastName">
    </div>
  </div>
  <div class="form-group row">
    <label for="edad" class="col-sm-2 col-form-label">Edad:</label>
    <div class="col-sm-10">
      <input type="number" step="any" class="form-control" name="age" id="age" value="$age">
    </div>
  </div>
  <div class="form-group row">
  </div>
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Editar Usuario</button>
    </div>
  </div>
Group1;
}
?>
</div>
</main>

</body>
