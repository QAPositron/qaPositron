<!DOCTYPE html>
<?php
    require('conexion.php');
    $query= "SELECT nombre_empresa, nit_empresa, telefono_empresa, correo_empresa FROM empresas ORDER BY nombre_empresa ASC";
    $resultado = $mysqli->query($query);
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>CREAR EMPRESA</title>

</head>
<body>

    <h1 align="center">CREAR EMPRESA</h1>
    <form action="registrar_empresa.php" method="POST"> 
        <table>
            <tr>
                <td>NOMBRE:</td>
                <td><input type="text" name="nombre_empresa" id="nombre_empresa" style="text-transform:uppercase;"></td>
                <td>NIT/RUT:</td>
                <td><input type="text" name="nit_empresa" id="nit_empresa" style="text-transform:uppercase;"></td>
            </tr>
            <tr>
                <td>TELEFONO:</td>
                <td><input type="text" name="telefono_empresa" id="telefono_empresa" style="text-transform:uppercase;"></td>
                <td>CORREO:</td>
                <td><input type="text" name="correo_empresa" id="correo_empresa" style="text-transform:uppercase;"></td>
            </tr>
            
            <tr>
                <td><input type="submit" value="GUARDAR"></td>
            </tr>
        </table>

    </form>  
    <br>
    <h2 align="center">TODAS LAS EMPRESAS</h2>
    <table border="1" align="center">
        <tr>
            <th>NOMBRE</th> <th>NIT</th> <th>TELEFONO</th> <th>CORREO</th>
        </tr>
        <?php
            while($empresas=mysqli_fetch_array($resultado)){
                $nombre = $empresas['0'];
                $nit = $empresas['1'];
                $telefono = $empresas['2'];
                $correo = $empresas['3'];

                echo "<tr>";
                echo "<td>";  echo $nombre;   echo "</td>";
                echo "<td>";  echo $nit;      echo "</td>";
                echo "<td>";  echo $telefono; echo "</td>";
                echo "<td>";  echo $correo;   echo "</td>";
                echo "</tr>";
            }
            mysqli_free_result($resultado);
            mysqli_close($mysqli);    
        ?>
    </table>
</body>
</html>