<!DOCTYPE html>
    <?php
        require('conexion.php');
        $query1 = "SELECT id_empresa, nombre_empresa, nit_empresa FROM empresas ORDER BY nombre_empresa ASC";
        $result1 = $mysqli->query($query1);
    ?>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../css/bootstrap.min.css">


     

    <title>CREAR SEDE</title>

</head>
<body>
    
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a href="crear_sede.php" class="navbar-brand"><img src="../logointro2.png" width="100px"></a>
        </div>
    </nav>
    <div class="container p-auto">
    
           
                <?php if(isset($_SESSION['message'])) { ?>
                    <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
                        <strong><?= $_SESSION['message'] ?></strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php session_unset(); }?>
              
            <div class="contenedor ">
                <div class="row">
                    <div class="card card-body" style="width: 40rem;">
                        <h2 class="text-center">CREAR SEDE</h2>
                        <form action="registrar_sede.php" method="POST">
                            <div class="form-group">
                                <label for="">EMPRESA A LA QUE PERTENECE:</label>
                                <select class="form-select form-select-sm" name="id_empresa" id="id_empresa" autofocus style="text-transform:uppercase;">
                                    <option value ="">--SELECCIONE--</option>
                                    <?php
                                        while($row = mysqli_fetch_array($result1))
                                        {   $idEmpresa = $row["id_empresa"];
                                            $nitEmpresa = $row["nit_empresa"];
                                            $nombreEmpresa = $row["nombre_empresa"];
                                            echo "<option value=".$idEmpresa.">".$nitEmpresa." - ".$nombreEmpresa."</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            <br>
                            <div class="form-group">
                            <label for="">NOMBRE:</label>
                            <input type="text" name="nombre_sede" id="nombre_sede" class="form-control" placeholder="NOMBRE DE LA SEDE A CREAR" autofocus style="text-transform:uppercase;">
                            </div>
                            <br>
                            <div class="form-group">
                            <label for="">MUNICIPIO:</label>
                            <input type="text" name="municipio_sede" id="municipio_sede" class="form-control" placeholder="MUNICIPIO DONDE SE ENCUENTRA LA SEDE" autofocus style="text-transform:uppercase;">
                            </div>
                            <br>
                            <div class="form-group">
                            <label for="">DEPARTAMENTO:</label>
                            <input type="text" name="departamento_sede" id="departamento_sede" class="form-control" placeholder="DEPARTAMENTO DONDE SE ENCUENTRA LA SEDE" autofocus style="text-transform:uppercase;">
                            </div>
                            <br>
                            <div class="form-group">
                            <label for="">DIRECCIÓN:</label>
                            <input type="text" name="direccion_sede" id="direccion_sede" class="form-control" placeholder="DIRECCION DE LA SEDE A CREAR" autofocus style="text-transform:uppercase;">
                            </div>
                            <br>
                            <div class="d-grid gap-2">
                                <input type="submit" class="btn btn-info" name="boton-guardar" value="GURDAR">
                            </div>
                        </form>
                    </div>
                </div>    
            </div>
          
        
    </div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>
   