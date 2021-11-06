<?php   
   
    session_start();
   
   $mysqli = new mysqli("localhost", "root", "", "qapositr_qa2");

    if(mysqli_connect_errno()){
        echo 'Conexion Fallida:', mysqli_connect_error();
        exit();
    }
?>