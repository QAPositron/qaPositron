<!DOCTYPE html>
<?php
    require('conexion.php');
    $query1 = "SELECT id_dosimetro, codigo_dosimeter, tipo_dosimetro FROM dosimetro";
    $resultado1 = $mysqli->query($query1);

    $query2 = "SELECT id_trabajador, nombre_trabajador, tipo_trabajador FROM trabajador";
    $resultado2 = $mysqli->query($query2);
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASIGNACION DE DOSÍMETRO</title>
</head>
<body>
    <h1>ASIGNAR DOSÍMETRO</h1>
    <form action="registro_asignacion_dosimetro.php" method="POST">
        <table border="1"> 
            <tr>
                <td><div>
                    CODIGO DOSÍMETRO:
                    <select id="id_dosimetro" name="id_dosimetro" style="text-transform:uppercase;">
                        <option value="0">--SELECCIONE DOSIMETRO--</option>
                        <?php
                            while($row1 = $resultado1->fetch_assoc()) {   ?>
                                <option value="<?php echo $row1['id_dosimetro']; ?>"><?php echo $row1['tipo_dosimetro'].' - '.$row1['codigo_dosimeter']; ?></option>
                        <?php } ?>
                    </select>
                </div></td>
                <td><div>
                    TRABAJARDOR A ASIGNAR:
                    <select id="id_trabajador" name="id_trabajador" style="text-transform:uppercase;">
                        <option value="0">--SELECCIONE TRABAJADOR--</option>
                        <?php
                            while($row2 = $resultado2->fetch_assoc()) {   ?>
                                <option value="<?php echo $row2['id_trabajador']; ?>"><?php echo $row2['nombre_trabajador'].' - '.$row2['tipo_trabajador']; ?></option>
                        <?php } ?>
                    </select>
                </div></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="ASIGNAR" ></td>
            </tr>
        </table>
    </form>
</body>
</html>