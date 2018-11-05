<?php

if ( $_POST ) {

    $mail=$_POST["mail"];

    require('../connection_info.php');
    $link1 = new mysqli($dbhost, $dbuser ,$dbpass ,$dbname );
    if($link1->connect_error) {
        echo "Error de conexion $link1->connect_errno";
        exit;
    }
    var_dump($_POST);

    $query1 = $link1->query("INSERT INTO users
    (mail, firstName, lastName, age, record)
    VALUES (
    )
    ");
    if( !$query1) {
        echo "Error en la query1 $link1->error";
        exit;
    }
}

?>