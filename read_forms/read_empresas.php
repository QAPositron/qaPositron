<!DOCTYPE html>
<?php
    require('conexion.php');
    $query1 = "SELECT id_empresa, nombre_empresa, nit_empresa FROM empresas ORDER BY nombre_empresa ASC";
    $result1 = $mysqli->query($query1);

?>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script type="text/javascript" src="llenarTabla_empresas.js"></script>
    
    <title>BUSAR EMPRESA</title>
</head>
<body>
    <div class="container p-auto">
            
                <div class="row pt-5">
                    <div class="col">
                    </div>
                    <div class="col-6">
                        <form class=" d-flex form-inline text-center" >
                            <div class="form-group mb-2">
                                <input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="BUSCAR EMPRESA:">
                            </div>
                           
                            <div class="form-group pt-1">

                                <select class="form-select form-select-sm" name="id_empresa" id="id_empresa" autofocus style="text-transform:uppercase;" onchange="llenarTablaEmpresas($(this).val())">
                                    <option value ="">--SELECCIONE UNA EMPRESA--</option>
                                    <?php
                                        while($row = mysqli_fetch_array($result1))
                                        {   $idEmpresa = $row["id_empresa"];
                                            $nitEmpresa = $row["nit_empresa"];
                                            $nombreEmpresa = $row["nombre_empresa"];
                                            echo "<option value=".$idEmpresa.">".$nitEmpresa." - ".$nombreEmpresa."</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            <br>
                             <div class="form-group ms-3">  
                                <button type="submit" class="btn btn-primary mb-2">BUSCAR</button>
                            </div>
                        </form>
                    </div>
                    <div class="col"></div>
                </div>
            <br>
            <div class="row pt-5" id="tabla">
                                    
            </div>
       
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script type="type/javascript">
        $(document).ready(function(){
            llenarTablaEmpresas(0);
        });
    </script>
</body>
</html>
   