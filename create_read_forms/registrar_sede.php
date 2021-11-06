<?php
    require('conexion.php');

    //Obtener los valores del formulario
    if(isset($_POST['boton-guardar'])){
        $id_empresa = $_POST['id_empresa'];
        $nombreSede = strtoupper($_POST['nombre_sede']);
        $municipioSede = strtoupper($_POST['municipio_sede']);
        $departamentoSede =strtoupper($_POST['departamento_sede']);
        $direccionSede = strtoupper($_POST['direccion_sede']);
    }

    $instruccion_SQL = "insert into sede (id_sede, id_empresa, nombre_sede, municipio_sede, departamento_sede, direccion_sede) 
    values ('', '$id_empresa', '$nombreSede', '$municipioSede', '$departamentoSede', '$direccionSede')";  

    $ejecutar = $mysqli->query($instruccion_SQL);

    if(!$ejecutar){
        echo "HAY ALGUN ERROR";
    }else{
        echo "DATOS ALMACENADOS CORRECTAMENTE";
    }

    $_SESSION['message'] = nl2br(" $nombreSede \n 'EMPRESA GUARDADA CON EXITO' ");
    $_SESSION['message_type'] = 'warning';
    
    header("Location: crear_sede.php");

?>