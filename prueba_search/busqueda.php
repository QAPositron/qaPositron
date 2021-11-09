<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRUEBA SEARCH</title>
   
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    
    
</head>
<body>
    <?php
        require('conexion.php');
        $query1 = "SELECT * FROM empresas ORDER BY nombre_empresa ASC";
        $result1 = $mysqli->query($query1);
    ?>
    <div class="container p-auto">
        <header>
            <div class="alert alert-info">
                <h2>BUSCADOR EN TIEMPO REAL CON AJAX</h2>
            </div>
        </header>
        <div class="container p-auto">
            <div class="row pt-5">
                <div class="col"></div>
                <div class="col">
                    <form method="POST">
                        <label for="exampleFormControlInput1" class="form-label">BUSCAR: </label>
                        <select class="form-select form-select-sm"  name="tipo" id="tipo">
                            <option value="0">-SELECCIONE-</option>
                            <option value="1">--EMPRESAS--</option>
                            <option value="2">SEDES</option>
                            <option value="3">CONTACTOS</option>
                            <option value="4">TRABAJADORES</option>
                            <option value="5">DOSÍMETROS</option>
                        </select>
                        <br>
                        <label for="exampleFormControlInput1" class="form-label">BUSCAR: </label>
                        <input class="form-control" type="text" name="busqueda" id="busqueda" placeholder="--BUSCAR--">
                        <br>
                        <input class="btn btn-primary" type="submit" name="envio" id="envio">
                    </form>    
                </div>    
                <div class="col"></div>
            </div>
        </div>
        <br>
        <div class="row pt-5 bg-warning" id="tabla_resultado">
            
            <table class="table table-hover table-sm">
                <tr>
                    <th >NOMBRE</th> <th>NIT/RUT</th> <th>TELEFONO</th> <th>CORREO</th>
                </tr>
                
                <?php
                    while($empresas = mysqli_fetch_array($result1)){
                        $nombre = $empresas['0'];
                        $nit =$empresas['1'];
                        $telefono = $empresas['2'];
                        $correo = $empresas['3'];
        
                        echo "<tr>";
                        echo "<td>";  echo $nombre;    echo "</td>";
                        echo "<td>";  echo $nit;       echo "</td>";
                        echo "<td>";  echo $telefono;  echo "</td>";
                        echo "<td>";  echo $correo;    echo "</td>";
                        echo "</tr>";
                    }
                    mysqli_free_result($result1);
                    mysqli_close($mysqli);
                ?>
            </table>
        </div>
            
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="../js/bootstrap.min.js"></script>
    
</body>
</html>