<?php
    require('conexion.php');
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM empresas WHERE id_empresa = $id";
        $resultado = $mysqli->query($query);
        if(mysqli_num_rows($resultado)=='1'){
            $row = mysqli_fetch_array($resultado);
            $nombre = $row['nombre_empresa'];
            $nit = $row['nit_empresa'];
            $telefono = $row['telefono_empresa'];
            $correo = $row['correo_empresa'];
        }
    }

    if(isset($_POST['update'])){
        $id = $_GET['id'];
        $nombreEmp = strtoupper($_POST['nombreEmpresa']);
        $nitEmp = $_POST['nitEmpresa'];
        $telefonoEmp = $_POST['telefonoEmpresa'];
        $correoEmp = strtoupper($_POST['correoEmpresa']);

        $query1 = "UPDATE empresas set nit_empresa='$nitEmp', nombre_empresa=UPPER('$nombreEmp'), telefono_empresa='$telefonoEmp', correo_empresa=UPPER('$correoEmp') WHERE id_empresa='$id' ";
        $resultado1 = $mysqli->query($query1);

        $_SESSION['message']= nl2br("$nombreEmp \n 'ACTUALIZADA CON ÉXITO' ");
        $_SESSION['message_type']='warning';
        header("Location: ../create_read_forms/crear_empresa.php");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <title>EDITAR EMPRESAS</title>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a href="crear_empresa.php" class="navbar-brand"><img src="../logointro2.png" width="100px"></a>
        </div>
    </nav>
    <div class="container p-4">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card card-body">
                    <h4 class="text-center">EDITAR EMPRESA:<?php echo $nombre; ?></h4>    
                    <form action="edit_empresa.php?id=<?php echo $_GET['id'] ?>" method="POST">
                        <div class="form-group">
                            <label for="">NOMBRE:</label>
                            <input type="text" name="nombreEmpresa" value="<?php echo $nombre;?>" 
                            class="form-control" placeholder=" ACTUALICE EL NOMBRE DE LA EMPRESA" autofocus style="text-transform:uppercase;">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="">NIT/RUT:</label>
                            <input type="numeric" name="nitEmpresa" value="<?php echo $nit; ?>" 
                            class="form-control" placheholder="ACTUALICE EL NIT DE LA EMPRESA" autofocus>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="">TELEFONO:</label>
                            <input type="numeric" name="telefonoEmpresa" value="<?php echo $telefono; ?>" 
                            class="form-control" placheholder="ACTUALICE EL TELEFONO DE LA EMPRESA" autofocus>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="">CORREO:</label>
                            <input type="email" name="correoEmpresa" value="<?php echo $correo; ?>" 
                            class="form-control" placheholder="ACTUALICE EL CORREO DE LA EMPRESA" autofocus style="text-transform:uppercase;">
                        </div>
                        <br>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-info" name="update">GUARDAR</button>
                        <div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="../js/bootstrap.min.js"></script>    
</body>
</html>