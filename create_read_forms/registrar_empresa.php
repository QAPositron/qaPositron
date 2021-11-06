<?php
    require('conexion.php');

    //Obtener los valores del formulario
    if(isset($_POST['boton-guardar'])){
        $nombreEmpresa= strtoupper($_POST['nombre_empresa']);
        $nitEmpresa = $_POST['nit_empresa'];
        $telefonoEmpresa = $_POST['telefono_empresa'];
        $correoEmpresa =strtoupper($_POST['correo_empresa']);


        $instruccion_SQL = "insert into empresas (id_empresa, nombre_empresa, nit_empresa, telefono_empresa, correo_empresa) 
        values ('', '".strtoupper($nombreEmpresa)."', '$nitEmpresa', '$telefonoEmpresa', '".strtoupper($correoEmpresa)."')";  
        $ejecutar = $mysqli->query($instruccion_SQL);

        if(!$ejecutar){
            echo "HAY ALGUN ERROR";
        }else{
            echo "DATOS ALMACENADOS CORRECTAMENTE";
        }

        $_SESSION['message'] = nl2br(" $nombreEmpresa \n 'EMPRESA GUARDADA CON EXITO' ");
        $_SESSION['message_type'] = 'success';
        
        header("Location: crear_empresa.php");
        
    }
?>
