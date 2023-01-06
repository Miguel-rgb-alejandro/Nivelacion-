<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>CRUD Clientes</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" media="all">
    <link rel="stylesheet" href="css/all.min.css" media="all">
</head>
<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00FF5573";>
    Aplicacion CRUD PHP8 y MariaDB
    </nav>
    <div class="container">
        <?php

        if(isset($_GET['msg'])) {
            $msg = $_GET['msg'];
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">'.$msg.'
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
        }

        ?>
        <a href="agregarNuevoCliente.php" class="btn btn-dark mb-3 float-end">Agregar Nuevo</a>
        <table class="table table-hover text-center table-bordered">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombres</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Em@il</th>
                    <th scope="col">Genero</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
        <tbody>
        <?php

        include('db_conexion.php');

        $sql = "SELECT * FROM `clientes`";
        $resultado = mysqli_query($conexion, $sql);

        while($row = mysqli_fetch_assoc($resultado)) {
        ?>

            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['nombres']; ?></td>
                <td><?php echo $row['apellidos']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['genero']; ?></td>
                <td>
                    <a class="link-dark" href="editar.php?id=<?php echo $row['id']; ?>">
                        <i class="fa-solid fa-pen-to-square fs-4 me-3"></i>
                    </a>
                    <a class="link-dark" href="borrar.php?id=<?php echo $row['id']; ?>">
                        <i class="fa-solid fa-trash fs-4"></i>
                    </a>
                </td>
            </tr>

        <?php
        }
        ?>
        </tbody>
    </table>
    </div>
</body>
</html>
