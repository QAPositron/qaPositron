<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CREAR SEDE</title>
    
</head>
<body>
    <?php
        require('conexion.php');
        $query1 = "SELECT id_empresa, nombre_empresa, nit_empresa FROM empresas ORDER BY nombre_empresa ASC";
        $result = $mysqli->query($query1);
    ?>
    
    <h1>CREAR SEDE</h1>
    <form action="registrar_sede.php" method="POST">
        <table>
            <tr>
                <td>EMPRESA A LA QUE PERTENECE:</td>
                <td>
                    <select name="id_empresa" id="id_empresa" style="text-transform:uppercase;">
                        <option value ="">--SELECCIONE--</option>
                        <?php
                            while($row = mysqli_fetch_array($result))
                            {   $idEmpresa = $row["id_empresa"];
                                $nitEmpresa = $row["nit_empresa"];
                                $nombreEmpresa = $row["nombre_empresa"];
                                echo "<option value=".$idEmpresa.">".$nitEmpresa." - ".$nombreEmpresa."</option>";
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>NOMBRE:</td>
                <td><input type="text" name="nombre_sede" id="nombre_sede" style="text-transform:uppercase;"></td>
                <td>MUNICIPIO:</td>
                <td><input type="text" name="municipio_sede" id="municipio_sede" style="text-transform:uppercase;"></td>
            </tr>
            <tr>
                <td>DEPARTAMENTO:</td>
                <td><input type="text" name="departamento_sede" id="departamento_sede" style="text-transform:uppercase;"></td>
                <td>DIRECCIÓN:</td>
                <td><input type="text" name="direccion_sede" id="direccion_sede" style="text-transform:uppercase;"></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="ENVIAR" ></td>
            </tr>
        </table>
    </form>    

</body>
</html>