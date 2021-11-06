<?php
    require('conexion.php');

    //Obtener los valores del formulario
  
    $nombreContacto   = $_POST['nombres_contacto'];
    $apellidoContacto = $_POST['apellidos_contacto'];
    $correoContacto   = $_POST['correo_contacto'];
    $telefonoContacto = $_POST['telefono_contacto'];
    $cargoContacto    = $_POST['cargo_contacto'];
    $sedeContacto     = $_POST['lista_sede'];

   
    
    $instruccion_SQL1 = "insert into contactos (id_contacto, nombres_contacto, apellidos_contacto, correo_contacto, telefono_contacto, cargo_contacto) 
    values ('', '$nombreContacto', '$apellidoContacto', '$correoContacto', '$telefonoContacto', '$cargoContacto')";

    $ejecutar1 = $mysqli->query($instruccion_SQL1);
    $ultimo_id = mysqli_insert_id($mysqli);

    $instruccion_SQL2 = "insert into contactosede (id_contacto_sede, id_contacto, id_sede) values ('','$ultimo_id', '$sedeContacto')";
    $ejecutar2 = $mysqli->query($instruccion_SQL2);
    
    if(!$ejecutar1){
        echo "Hay algun error en la consulta 1";
    }else{
        echo "Datos almacenados correctamente consulta 1";
        echo $ultimo_id;
        if(!$ejecutar2){
            echo "Hay un error en la consulta 2";
        }else{
            echo "Datos almacenados correctamente consulta 2";
        }
    }
    
?>