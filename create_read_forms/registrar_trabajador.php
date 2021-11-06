<?php

    require('conexion.php');

     //Obtener los valores del formulario
     
     $idSedeTrabajador   = $_POST['lista_sede'];
     $nombreTrabajador   = $_POST['nombre_trabajador'];
     $cedulaTrabajador   = $_POST['cedula_trabajador'];
     $telefonoTrabajador = $_POST['telefono_trabajador'];
     $tipoTrabajador     = $_POST['tipo_trabajador'];
     $generoTrabajador   = $_POST['genero_trabajador'];
     
     
     $instruccion_SQL1 = "insert into trabajador (id_trabajador, nombre_trabajador, cedula_trabajador, telefono_trabajador, tipo_trabajador, genero_trabajador) values ('', '$nombreTrabajador', '$cedulaTrabajador', '$telefonoTrabajador', '$tipoTrabajador', '$generoTrabajador')";
      
     $ejecutar1 = $mysqli->query($instruccion_SQL1);
     $ultimo_id = mysqli_insert_id($mysqli);
     
     if(!$ejecutar1){
         echo "hay algun error en la consulta 1";
     }else{
         echo "Datos almacenados correctamente consulta 1";
         echo $ultimo_id;
         $instruccion_SQL2 = "insert into trabajadorsede (id_trabajador_sede, id_trabajador, id_sede) values ('', '$ultimo_id', '$idSedeTrabajador')";
         $ejecutar2 = $mysqli->query($instruccion_SQL2);
         if(!$ejecutar2){
            echo "hay algun error en la consulta 2";
         }else{
            echo "Datos almacenados correctamente consulta 2";
         }
     }

?>
