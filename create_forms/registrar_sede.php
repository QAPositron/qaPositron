<?php
    require('conexion.php');

    //Obtener los valores del formulario

    $id_empresa = $_POST['id_empresa'];
    $nombreSede = $_POST['nombre_sede'];
    $municipioSede = $_POST['municipio_sede'];
    $departamentoSede =$_POST['departamento_sede'];
    $direccionSede = $_POST['direccion_sede'];


    $instruccion_SQL = "insert into sede (id_sede, id_empresa, nombre_sede, municipio_sede, departamento_sede, direccion_sede) 
    values ('', '$id_empresa', '$nombreSede', '$municipioSede', '$departamentoSede', '$direccionSede')";  
    

    
    
    $ejecutar = $mysqli->query($instruccion_SQL);

    if(!$ejecutar){
        echo "HAY ALGUN ERROR";
    }else{
        echo "DATOS ALMACENADOS CORRECTAMENTE";
    }
    

?>