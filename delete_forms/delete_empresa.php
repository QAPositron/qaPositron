<?php
    require('conexion.php');

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query="SELECT nombre_empresa FROM empresas WHERE id_empresa = $id";
        $resultado = $mysqli->query($query);
        if(mysqli_num_rows($resultado)=='1'){
            $row = mysqli_fetch_array($resultado);
            $nombre = $row['nombre_empresa'];
        }
        $query1 = "DELETE FROM empresas WHERE id_empresa = $id";
        $resultado1 = $mysqli->query($query1);
        if(!$resultado1){
            die("Query Failed");
        }

        $_SESSION['message'] = nl2br("$nombre \n 'ELIMINADA CON ÉXITO'");
        $_SESSION['message_type'] = 'danger';
        header("Location: ../create_read_forms/crear_empresa.php");
    }
?>