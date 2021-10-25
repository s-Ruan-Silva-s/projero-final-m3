<?php 
    $hostname = "localhost";
    $database = "rkn_projetos_internos";
    $user = "root";
    $password = "";

    $mysqli = new mysqli($hostname, $user, $password, $database);
    if($mysqli->connect_errno){
        echo $mysqli->connect_error;
    }
?>