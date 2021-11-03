<!DOCTYPE html>
<?php
        require('conexion.php');
        $query1 = "SELECT id_empresa, nombre_empresa, nit_empresa FROM empresas ORDER BY nombre_empresa ASC" ;
        $resultado1 = $mysqli->query($query1);

        $query2 = "SELECT nombres_contacto, apellidos_contacto, correo_contacto, telefono_contacto, cargo_contacto FROM contactos ORDER BY nombres_contacto ASC";
        $resultado2 = $mysqli->query($query2);
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>CREAR CONTACTO</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
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

    <h1>CREAR CONTACTO</h1>
    <form action="registrar_contacto.php" method="POST">
        
        <table>
            
                <div>
                    EMPRESA A LA QUE PERTENECE:
                    <select id="lista_empresas" name="lista_empresas" style="text-transform:uppercase;"> 
                        <option value="0">--SELECCIONE EMPRESA--</option>
                        <?php 
                        while($row = $resultado1->fetch_assoc()) {   ?>
                            <option value="<?php echo $row['id_empresa']; ?>"><?php echo 
                            $row['nombre_empresa']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div id="lista_sede"></div>
        
            <tr>
                <td>NOMBRES:</td>
                <td><input type="text" name="nombres_contacto" id="nombres_contacto" style="text-transform:uppercase;"></td>
                <td>APELLIDOS:</td>
                <td><input type="text" name="apellidos_contacto" id="apellidos_contacto" style="text-transform:uppercase;"></td>
                
            </tr>
            <tr>
                <td>CORREO:</td>
                <td><input type="text" name="correo_contacto" id="correo_contacto" style="text-transform:uppercase;"></td>
                <td>TÉLEFONO:</td>
                <td><input type="number" name="telefono_contacto" id="telefono_contacto"></td>
                
            </tr>
            <tr>
                <td>CARGO:</td>
                <td><input type="text" name="cargo_contacto" id="cargo_contacto" style="text-transform:uppercase;"></td>
                <td><input type="submit" value="Enviar"></td>
            </tr>
            
        </table>

    </form>
    <br>
    <h2 align="center">TODAS LOS CONTACTOS</h2>
    <table border="1" align="center">
        <tr>
            <th>NOMBRES</th> <th>APELLIDOS</th> <th>CORREO</th> 
            <th>TÉLEFONO</th> <th>CARGO</th>
        </tr>
        <?php
            while($contactos=mysqli_fetch_array($resultado2)){
                $nombres = $contactos['0'];
                $apellidos = $contactos['1'];
                $correo = $contactos['2'];
                $telefono = $contactos['3'];
                $cargo = $contactos['4'];

                echo "<tr>";
                echo "<td>";  echo $nombres;   echo "</td>";
                echo "<td>";  echo $apellidos; echo "</td>";
                echo "<td>";  echo $correo;    echo "</td>";
                echo "<td>";  echo $telefono;  echo "</td>";
                echo "<td>";  echo $cargo;     echo "</td>";
                echo "</tr>";
            }
            mysqli_free_result($resultado2);
            mysqli_close($mysqli);
        ?>
    </table>
</body>
</html>
