<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
    <?php 
         require('conexion.php');
         $id_empresa = $_POST['empresa'];

        $sql = "SELECT nombre_empresa, nit_empresa, telefono_empresa, correo_empresa FROM empresas WHERE id_empresa = '$id_empresa' ORDER BY nombre_empresa ASC";
        $result = mysqli_query($conn, $sql);

        $cadena = " <h2 class='text-center'>TODAS LAS EMPRESAS</h2>
                    <table class= 'table table-hover table-sm'>
                        <thead>
                            <tr class='bg-success'>
                                <th scope='col'>NOMBRE</th>
                                <th scope='col'> NIT/RUT</th>
                                <th scope='col'>TELEFONO</th>
                                <th scope='col'>CORREO</th>
                                <th scope='col'>ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>";
        while($ver = mysqli_fetch_row($result)){
            $cadena=$cadena."<tr>
                                <td>".$fila['nombre_empresa']."</td>
                                <td>".$fila['nit_empresa']." </td>
                                <td>".$fila['telefono_empresa']."</td>
                                <td>".$fila['correo_empresa']." </td>
                            </tr>";
        }
        echo $cadena."<tbody></table>";
    ?>
</body>
</html>