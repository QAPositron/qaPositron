<!DOCTYPE html>
<?php
    require('conexion.php');
    
?>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <title>CREAR EMPRESA</title>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a href="crear_empresa.php" class="navbar-brand"><img src="../logointro2.png" width="100px"></a>
        </div>
    </nav>
    <div class="container p-auto">
        <div class="row mt-5">
            <div class="col-md-4">
                <?php if(isset($_SESSION['message'])) { ?>
                    <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
                        <strong><?= $_SESSION['message'] ?></strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php session_unset(); }?>
              

                <div class="card card-body mt-4">
                    <h2 class="text-center">CREAR EMPRESA</h2>
                    <form action="registrar_empresa.php" method="POST">
                        <div class="form-group">
                          <label for="">NOMBRE:</label>
                          <input type="text" name="nombre_empresa" id="nombre_empresa" class="form-control" placeholder="NOMBRE DE LA INSTITUCIÓN A CREAR" autofocus style="text-transform:uppercase;">
                        </div>
                        <br>
                        <div class="form-group">
                          <label for="">NIT/RUT:</label>
                          <input type="numeric" name="nit_empresa" id="nit_empresa" class="form-control" placeholder="NIT/RUT DE LA INSTITUCIÓN A CREAR" autofocus style="text-transform:uppercase;">
                        </div>
                        <br>
                        <div class="form-group">
                          <label for="">TELEFONO:</label>
                          <input type="numeric" name="telefono_empresa" id="telefono_empresa" class="form-control" placeholder="TELEFONO DE LA INSTITUCIÓN A CREAR" autofocus style="text-transform:uppercase;">
                        </div>
                        <br>
                        <div class="form-group">
                          <label for="">CORREO:</label>
                          <input type="text" name="correo_empresa" id="correo_empresa" class="form-control" placeholder=" CORREO DE LA INSTITUCIÓN A CREAR" autofocus style="text-transform:uppercase;">
                        </div>
                        <br>
                        <div class="d-grid gap-2">
                            <input type="submit" class="btn btn-info" name="boton-guardar" value="GURDAR">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-8 p-4">
                <h2 class="text-center">TODAS LAS EMPRESAS</h2>
                <table class= "table table-bordered">
                    <thead>
                        <tr>
                            <th>NOMBRE</th>
                            <th>NIT/RUT</th>
                            <th>TELEFONO</th>
                            <th>CORREO</th>
                            <th style="width: 14.95%">ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query= "SELECT nombre_empresa, nit_empresa, telefono_empresa, correo_empresa, id_empresa FROM empresas ORDER BY nombre_empresa ASC";
                        $resultado = $mysqli->query($query);

                        while ($row = mysqli_fetch_array($resultado)) {?>
                            <tr>
                                <td><?php echo $row['nombre_empresa'] ?></td>
                                <td><?php echo $row['nit_empresa'] ?></td>
                                <td><?php echo $row['telefono_empresa'] ?></td>
                                <td><?php echo $row['correo_empresa'] ?></td>
                                <td>
                                    <a href="../update_forms/edit_empresa.php?id=<?php echo $row['id_empresa']?>" class="btn btn-secondary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                                        <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
                                        </svg>
                                    </a>
                                    <a href="../delete_forms/delete_empresa.php?id=<?php echo $row['id_empresa']?>" class="btn btn-danger">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        <?php }?>
                        
                    </tbody>
                </table>

            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>
   