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

<?php

if ( $_POST ) {

    $mail=$_POST["mail"];
    $firstName=$_POST["firstName"];
    $lastName=$_POST["lastName"];
    $age=$_POST["age"];

    require('../connection_info.php');

    $link1 = new mysqli($dbhost, $dbuser ,$dbpass ,$dbname );
    if($link1->connect_error) {
        echo "Error de conexion $link1->connect_errno";
        exit;
    }

    $query1 = $link1->query("UPDATE users
    SET firstName = '$firstName' ,
    lastName = '$lastName' ,
    age = '$age' 
    WHERE mail = '$mail';");
    if( !$query1) {
        echo "Error en la query1 $link1->error";
        exit;
    } else {
        echo "<br><h1>Usuario actualizado con exito</h1>";
        echo '<h2><a href="../">VOLVER</a></h2>';
    }
}
?>