<?php
    $conn = mysqli_connect("localhost", "root", "", "qapositr_qa2");
    $id_empresa = $_POST['empresa'];

    $sql = "SELECT id_sede, nombre_sede FROM sede WHERE id_empresa = '$id_empresa'";
    $result = mysqli_query($conn, $sql);
    

    $cadena = "<label>SELECCIONE SEDE:</label> 
    <select id='lista_sede' name='lista_sede'>
    <option value='0'>--SELECCIONE SEDE--</option>";
 
    while($ver = mysqli_fetch_row($result)){
        $cadena = $cadena.'<option value='.$ver[0].'>'.utf8_encode($ver[1]).'</option>';
    }
    echo  $cadena."</select>";
?>