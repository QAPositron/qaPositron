<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
<?php
   $conn = mysqli_connect("localhost", "root", "", "qapositr_qa2");
   $id_empresa = $_POST['empresa'];

   $sql = "SELECT id_sede, nombre_sede FROM sede WHERE id_empresa = '$id_empresa' ORDER BY nombre_sede ASC";
   $result = mysqli_query($conn, $sql);
   

   $cadena = "<td><label>SELECCIONE SEDE:</label></td> 
   <td><select id='lista_sede' name='lista_sede' style='text-transform:uppercase;'>
   <option value='0'>--SELECCIONE SEDE--</option>";

   while($ver = mysqli_fetch_row($result)){
       $cadena = $cadena.'<option value='.$ver[0].'>'.utf8_encode($ver[1]).'</option>';
   }
   echo  $cadena."</select></td>";
?>
</body>
</html>
