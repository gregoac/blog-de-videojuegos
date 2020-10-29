<?php

// Crear la conexión
$server = 'localhost';
$user = 'root';
$password = 'root';
$database = 'blog_master';

$db = mysqli_connect($server, $user, $password, $database);

mysqli_query($db, "SET NAMES 'utf8'");

// Iniciar la sesión

if(!isset($_SESSION)){
    session_start();
}

/*
if($db == true){
    echo "la conexión se realizó con exito";
} else {
    echo "la conexión ha fallado";
}
*/