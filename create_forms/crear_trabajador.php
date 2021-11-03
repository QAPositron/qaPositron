<!DOCTYPE html>

<html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>CREAR TRABAJADOR</title>

    <script
        src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous">
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            recargarLista();
            
            $('#lista_empresas').change(function(){
                recargarLista();
            })
        })
    </script>
    <script type="text/javascript">
        function recargarLista(){
            $.ajax({
                type:"POST",
                url:"getSede.php",
                data:"empresa=" + $('#lista_empresas').val(),
                success:function(r){
                    $('#lista_sede').html(r);
                }
            });
        }
    </script>
</head>
<body>

    <?php
        require('conexion.php');
        $query1 = "SELECT id_empresa, nombre_empresa, nit_empresa FROM empresas ORDER BY nombre_empresa ASC";
        $result1 = $mysqli->query($query1);

        require('conexion.php');
        $query2 = "SELECT nombre_trabajador, cedula_trabajador, telefono_trabajador, tipo_trabajador, genero_trabajador FROM trabajador ORDER BY nombre_trabajador ASC";
        $resultado2 = $mysqli->query($query2);
    ?>
    
    <h1>CREAR TRABAJADOR</h1>
    <form action="registrar_trabajador.php" method="POST">
        <table border="1">
            <div>
                EMPRESA A LA QUE PERTENECE:
                <select name="lista_empresas" id="lista_empresas" style="text-transform:uppercase;">
                        <option value ="">--SELECCIONE EMPRESA--</option>
                        <?php
                            while($row = mysqli_fetch_array($result1))
                            {   $idEmpresa = $row["id_empresa"];
                                $nitEmpresa = $row["nit_empresa"];
                                $nombreEmpresa = $row["nombre_empresa"];
                                echo "<option value=".$idEmpresa.">(".$nitEmpresa.") ".$nombreEmpresa."</option>";
                            }
                        ?>
                </select>
            </div>    
            <div id="lista_sede"></div>
            
            <tr>
                <td>NOMBRE:</td>
                <td><input type="text" name="nombre_trabajador" id="nombre_trabajador" style="text-transform:uppercase;"></td>
                <td>CÉDULA:</td>
                <td><input type="number" name="cedula_trabajador" id="cedula_trabajador"></td>
            </tr>
            <tr>
                <td>TELÉFONO:</td>
                <td><input type="number" name="telefono_trabajador" id="telefono_trabajador"></td>
                <td>TIPO DE TRABAJADOR:</td>
                <td>&nbsp;
                    <select name="tipo_trabajador" id="tipo_trabajador" style="text-transform:uppercase;">
                        <option value=""> Seleccione...</option>
                        <option value="TOES">TOE: Trabajador ocupacionalmente expuesto</option>
                        <option value="OPR">OPR: Oficial de protección radiológica</option>
                        <option value="CASO">CASO: TRABAJADOR CON DOSIMETRO TIPO CASO</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>GÉNERO:</td>
                    <td>&nbsp;
                        <select name="genero_trabajador" id="genero_trabajador" style="text-transform:uppercase;">
                            <option value="">Seleccione...</option>
                            <option value="femenino">Femenino</option>
                            <option value="masculino">Masculino</option>
                            <option value="otro">Otro</option>
                        </select>
                    </td>
                <td><input type="submit" value="GUARDAR"></td>
            </tr>
        </table>
    </form>
    <br>
    <h2 align="center">TODOS LOS TRABAJADORES</h2>
    <table border="1" align="center">
        <tr>
            <th>NOMBRE</th> <th>CEDULA</th> <th>TELEFONO</th> <th>TIPO DE TRABAJADOR</th> <th>GÉNERO</th>
        </tr>
        <?php
            while($trabajadores = mysqli_fetch_array($resultado2)){
                $nombre = $trabajadores['0'];
                $cedula =$trabajadores['1'];
                $telefono = $trabajadores['2'];
                $tipoTrabajador = $trabajadores['3'];
                $genero = $trabajadores['4'];

                echo "<tr>";
                echo "<td>";  echo $nombre;           echo "</td>";
                echo "<td>";  echo $cedula;           echo "</td>";
                echo "<td>";  echo $telefono;         echo "</td>";
                echo "<td>";  echo $tipoTrabajador;   echo "</td>";
                echo "<td>";  echo $genero;           echo "</td>";
                echo "</tr>";
            }
            mysqli_free_result($resultado2);
            mysqli_close($mysqli);
        ?>
    </table>
</body>
</html>