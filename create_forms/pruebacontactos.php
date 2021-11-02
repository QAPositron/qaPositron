<?php
    require('conexion.php');
    $query = "SELECT id_empresa, nombre_empresa FROM empresas ORDER BY nombre_empresa ASC" ;
    $resultado = $mysqli->query($query);
    
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
    <form id="combo" name="combo" method="POST">
    
        <div>SELECCIONE EMPRESA:
            <select id="lista_empresas" name="lista_empresas"> 
                <option value="0">--SELECCIONE EMPRESA--</option>
                <?php 
                while($row = $resultado->fetch_assoc()) {   ?>
                    <option value="<?php echo $row['id_empresa']; ?>"><?php echo 
                    $row['nombre_empresa']; ?></option>
                <?php } ?>
            </select>
        </div>
        <div id="lista_sede"></div>
      
    </form>
    
</body>

</html>
