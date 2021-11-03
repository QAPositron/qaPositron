<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   
    <?php
        $conn = mysqli_connect("localhost", "root", "", "qapositr_qa2");
        $id_dosimetro = $_POST['Ndosimetro'];
        echo  $id_dosimetro;/* echo  "<h1> MODIFICAR DOSIMETRO #"; echo $id_dosimetro; echo "</h1>";  #</h1>$id_dosimetro; */
    ?>
    <h1> MODIFICAR DOSIMETRO # <?php echo $id_dosimetro;?></h1>
</body>
</html>