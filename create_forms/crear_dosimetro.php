<!DOCTYPE html>
<?php
    require('conexion.php');
    $query1 = "SELECT codigo_dosimeter, tipo_dosimetro, fecha_ingreso_servicio, ocupacion, periodo_recambio FROM dosimetro ORDER BY codigo_dosimeter";
    $resultado1 = $mysqli->query($query1);
?>
<html>
<head>
    <meta charset="utf-8">
    <title>CREAR DOSIMETRO principal</title>
</head>
<body>
    <h1>CREAR DOSÍMETRO</h1>
    <form action="registrar_dosimetro.php" method="POST">
        <table>
            <tr>
                <td>NÚMERO DOSÍMETRO:</td>
                <td><input type="number" name="numero_dosimetro" id="numero_dosimetro"></td>
            </tr>
            <tr>
                <td>TIPO DE DOSÍMETRO:</td>
                <td>&nbsp;
                    <select name="tipo_dosimetro" id="tipo_dosimetro" style="text-transform:uppercase;">
                        <option value="">Seleccione...</option>
                        <option value="Anillo">Anillo</option>
                        <option value="Pulcera">Pulcera</option>
                        <option value="Cristalino">Cristalino</option>
                        <option value="Cuerpo entero">Cuerpo entero</option>
                    </select>
                </td>
                <td>FECHA DE INGRESO AL SERVICIO:</td>
                <td><input type="date" name="fechaIngresoServicio_dosimetro" id="fechaIngresoServicio_dosimetro"></td>
            </tr>
            <tr>
                <td>OCUPACIÓN DEL DOSÍMETRO:</td>
                <td>&nbsp;
                    <select name="ocupacion_dosimetro" id="ocupacion_dosimetro" style="text-transform:uppercase;">
                        <option value="">Seleccione...</option>
                        <option value="Mensual">Mensual</option>
                        <option value="Trimestral">Trimestral</option>
                    </select>
                </td>
                <td>PERIODO DE RECAMBIO:</td>
                <td>&nbsp;
                    <select name="periodoRecam_dosimetro" id="periodoRecam_dosimetro" style="text-transform:uppercase;">
                        <option value="">Seleccione...</option>
                        <option value="Mensual">Mensual</option>
                        <option value="Trimestral">Trimestral</option>
                    </select>
                </td>    
            </tr>
            <tr>
                <td>ENERGÍA:</td>
                <td>&nbsp;
                    <select name="energia_dosimetro" id="energia_dosimetro" style="text-transform:uppercase;">
                        <option value="">Seleccione...</option>
                        <option value="Fotones">Fotones</option>
                        <option value="Potrones">Potrones</option>
                        <option value="Beta">Beta</option>
                    </select>
                </td>
                <td>ZERO LEVEL DATE:</td>
                <td><input type="date" name="zeroLevelDate" id="zeroLevelDate"></td>
            </tr>
            <tr>
                <td>MEASUREMENT DATE:</td>
                <td><input type="date" name="measurementDate" id="measurementDate"></td>
                <td>Hp007_CALC_DOSE:</td>
                <td><input type="number" step="0.001" name="hp007CalcDose" id="hp007CalcDose"></td>
            </tr>
            <tr>
                <td>Hp007_BACKGROUND_DOSE</td>
                <td><input type="number" step="0.001" name="hp007BackgroundDose" id="hp007BackgroundDose"></td>
                <td>Hp007_RAW_DOSE</td>
                <td><input type="number" step="0.001" name="hp007RawDose" id="hp007RawDose"></td>
            </tr>
            <tr>
                <td>Hp10_CALC_DOSE:</td>
                <td><input type="number" step="0.001" name="hp10CalcDose" id="hp10CalcDose"></td>
                <td>Hp10_BACKGROUND_DOSE:</td>
                <td><input type="number" step="0.001" name="hp10BackgroundDose" id="hp10BackgroundDose"></td>
            </tr>
            <tr>
                <td>Hp10_RAW_DOSE:</td>
                <td><input type="number" step="0.001" name="hp10RawDose" id="hp10RawDose"></td>
                <td>EzClip_CALC_DOSE:</td>
                <td><input type="number" step="0.001" name="ezclipCalcDose" id="ezclipCalcDose"></td>
            </tr>
            <tr>
                <td>EzClip_BACKGROUND_DOSE:</td>
                <td><input type="number" step="0.001" name="ezclipBackgroundDose" id="ezclipBackgroundDose"></td>
                <td>EzClip_raw_dose:</td>
                <td><input type="number" step="0.001" name="ezclipRawDose" id="ezclipRawDose"></td>
            </tr>
            <tr>
                <td>VERIFICATION_DATE</td>
                <td><input type="date" name="verificationDate" id="verificationDate"></td>
                <td>VERIFICATION_REQUIRED_ON_OR_BEFORE: </td>
                <td><input type="date" name="verificationRequiredBefore" id="verificationRequiredBefore"></td>
            </tr>
            <tr>
                <td>REMAINIG_DAYS_AVAILABLE_FOR_USE:</td>
                <td><input type="number" name="remainingDaysForUse" id="remainingDaysForUse"></td>
                
                <td><input type="submit" value="Enviar"></td>
            </tr>
        </table>
    </form>
    <br>
    <h2 align="center">TODOS LOS DOSÍMETROS</h2>
    <table border="1" align="center">
        <tr>
            <th>CODIGO</th> <th>TIPO DE DOSÍMERTRO</th> <th>FECHA DE INGRESO AL SERVICIO</th> 
            <th>OCUPACIÓN DEL DOSÍMETRO</th> <th>PERIODO DE RECAMBIO</th>
        </tr>
        <?php
            while($dosimetros = mysqli_fetch_array($resultado1)){
                $codigo = $dosimetros['0'];
                $tipo = $dosimetros['1'];
                $fechaIng = $dosimetros['2'];
                $ocupacion = $dosimetros['3'];
                $periodoRCam = $dosimetros['4'];

                echo "<tr>";
                echo "<td>";  echo $codigo;     echo "</td>";
                echo "<td>";  echo $tipo;       echo "</td>";
                echo "<td>";  echo $fechaIng;   echo "</td>";
                echo "<td>";  echo $ocupacion;  echo "</td>";
                echo "<td>";  echo $periodoRCam;echo "</td>";
                echo "</tr>";
            }
            mysqli_free_result($resultado1);
            mysqli_close($mysqli);
        ?>
    </table>
</body>
</html>