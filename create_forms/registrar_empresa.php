<?php
    require('conexion.php');

    //Obtener los valores del formulario

    $nombreEmpresa= $_POST['nombre_empresa'];
    $nitEmpresa = $_POST['nit_empresa'];
    $telefonoEmpresa = $_POST['telefono_empresa'];
    $correoEmpresa =$_POST['correo_empresa'];

   

    $instruccion_SQL = "insert into empresas (id_empresa, nombre_empresa, nit_empresa, telefono_empresa, correo_empresa) 
    values ('', '$nombreEmpresa', '$nitEmpresa', '$telefonoEmpresa', '$correoEmpresa')";  
    $ejecutar = $mysqli->query($instruccion_SQL);

       if(!$ejecutar){
            echo "HAY ALGUN ERROR";
        }else{
            echo "DATOS ALMACENADOS CORRECTAMENTE";
        }
    

?>
