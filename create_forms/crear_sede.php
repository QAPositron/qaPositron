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
        $result1 = $mysqli->query($query1);

        $query2 = "SELECT nombre_sede, municipio_sede, departamento_sede, direccion_sede FROM sede ORDER BY nombre_sede ASC";
        $result2 = $mysqli->query($query2);

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
                            while($row = mysqli_fetch_array($result1))
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
    <br>
    <h2 align="center">TODAS LAS SEDES</h2>
    <table border="1" align="center">
        <tr>
            <th>NOMBRE</th> <th>MUNICIPIO</th> <th>DEPARTAMENTO</th>
            <th>DIRECCIÓN</th>
        </tr>
        <?php
            while($sedes=mysqli_fetch_array($result2)){
                $nombre = $sedes['0'];
                $municipio = $sedes['1'];
                $departamento = $sedes['2'];
                $direccion = $sedes['3'];

                echo "<tr>";
                echo "<td>";  echo $nombre;         echo "</td>";
                echo "<td>";  echo $municipio;      echo "</td>";
                echo "<td>";  echo $departamento;   echo "</td>";
                echo "<td>";  echo $direccion;      echo "</td>";
                echo "</tr>";
            }
            mysqli_free_result($result2);
            mysqli_close($mysqli);
        ?>
    </table>
</body>
</html>