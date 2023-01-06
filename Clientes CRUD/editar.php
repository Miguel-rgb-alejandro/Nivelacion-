<?php

include('db_conexion.php');

$id = $_GET['id'];

if(isset($_POST['botonActualizar'])) {

    $nombres = $_POST['txtNombres'];
    $apellidos = $_POST['txtApellidos'];
    $correo = $_POST['txtCorreo'];
    $genero = $_POST['radioGenero'];

    $sql = "UPDATE `clientes` SET `nombres`='$nombres',`apellidos`='$apellidos',`email`='$correo',`genero`='$genero' WHERE id=$id;";

    $resultado = mysqli_query($conexion, $sql);

    if($resultado) {
        header("Location:index.php?msg=Registro Actualizado con Exito");
    } else {
        echo "Fallo".mysqli_error($conexion);
    }

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Agregar Nuevo Cliente</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" media="all">
</head>
<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00FF5573";>
    Aplicacion CRUD PHP8 y MariaDB
    </nav>
    <div class="container mb-4">
        <h3 class="text-center">Editar Informacion De Usuario</h3>
        <p class="text-muted text-center">Da Click en Actualizar despues de cambiar la información
        </p>
    </div>

    <?php

    $id = $_GET['id'];
    $sql ="SELECT * FROM `clientes` WHERE id = $id LIMIT 1";
    $resultado = mysqli_query($conexion, $sql);
    $row = mysqli_fetch_assoc($resultado);

    ?>

    <div class="container d-flex justify-content-center">
        <form action="" method="post" style="width:50vw; min-width:300px;">
            <div class="row mb-3">
                <div class="row col">
                    <label class="form-label">Nombres:</label>
                    <input class="text" class="form-control" name="txtNombres" value="<?php echo $row['nombres']; ?>" required>
                </div>&nbsp;
                <div class="row col">
                    <label class="form-label">Apellidos:</label>
                    <input class="text" class="form-control" name="txtApellidos" value="<?php echo $row['apellidos']; ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="form-label">Em@il:</label>
                <input class="email" class="form-control" name="txtCorreo" value="<?php echo $row['email']; ?>" required>
            </div>
            <div class="form-group mb-3 justify-content-center">
                <label for="">Genero:</label>&nbsp;&nbsp;
                <input id="masculino" value="masculino" type="radio" class="form-check-radio" name="radioGenero" <?php echo ($row['genero']=='masculino')?"checked":""; ?> >
                <label for="masculino" class="form-input-label">Masculino</label>&nbsp;&nbsp;
                <input id="femenino" value="femenino" type="radio" class="form-check-radio" name="radioGenero" <?php echo ($row['genero']=='femenino')?"checked":""; ?> >
                <label for="femenino" class="form-input-label">Femenino</label>
            </div>
            <div class="float-end">
                <a href="index.php" class="btn btn-danger">Cancelar</a>
                <button type="submit" class="btn btn-success" name="botonActualizar">Actualizar</button>
            </div>
        </form>
    </div>
</body>
</html>
