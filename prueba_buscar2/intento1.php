<?php
    if(isset($_POST['submit'])){
        $nombre = $_POST['nombre'];
        $nota1 = $_POST['nota1'];
        $nota2 = $_POST['nota2'];
        $nota3 = $_POST['nota3'];
        $promedio =($nota1 + $nota2 + $nota3)/3;
        echo "<p> {$nombre} tu promedio es:{$promedio}</p>";
    }    

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INTENTO 1</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <h1>PROMEDIOS</h1>
        <label for=""> NOMBRE:</label>
        <input type="text" name="nombre">
        <br>
        <label for=""> NOTA 1:</label>
        <input type="text" name="nota1">
        <br>
        <label for=""> NOTA 2:</label>
        <input type="text" name="nota2">
        <br>
        <label for=""> NOTA 3:</label>
        <input type="text" name="nota3">
        <br>
        <input class="btn btn-primary" type="submit" value="ENVIAR" name="submit">
    </form>
</body>
</html>