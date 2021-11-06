<?php
    require('conexion.php');
    //Obtener los valores del formulario

    $id_dosimetro = $_POST['id_dosimetro']; 
    $id_trabajador = $_POST['id_trabajador'];

    $instruccion_SQL1 = "insert into trabajadordosimetro (id_trabajador_dosimetro, id_trabajador, id_dosimetro) 
    values ('', '$id_trabajador', '$id_dosimetro')";
    $ejecutar1 = $mysqli->query($instruccion_SQL1);
  
    if(!$ejecutar1){
        echo "Hay algun error en la consulta 1";
    }else{
        echo "Datos almacenados correctamente consulta 1";
    }
?>