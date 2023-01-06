<?php

mysqli_report(MYSQLI_REPORT_OFF);

$servidor = "localhost";
$usuario = "root";
$baseDatos = "CarteraClientes";
$contrasena = "";

$conexion = new mysqli($servidor, $usuario, $contrasena, $baseDatos);


if($conexion->connect_error) {
    die("FALLA CONEXION A BASE DE DATOS NO ESTABLECIDAD".$connect_error->connect_error);
}

?>

