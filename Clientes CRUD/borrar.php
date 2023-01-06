<?php

include('db_conexion.php');

$id = $_GET['id'];
$sql = "DELETE FROM `clientes` WHERE id = $id";
$resultado = mysqli_query($conexion, $sql);

if($resultado) {
    header("Location:index.php?msg=Registro Eliminado Correctamente");
} else {
    echo "Failed: ".mysqli_error($conexion);
}

?>
