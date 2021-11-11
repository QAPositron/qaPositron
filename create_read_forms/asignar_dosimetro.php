<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASIGNAR DOSÍMETRO</title>

    <link rel="stylesheet" href="../css/bootstrap.min.css">
        
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="../logo_positron.png" width="170px"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">ASIGNAR</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">BUSCAR</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">XXXXX</a>
                </li>
            </ul>
            <span class="navbar-text">
                MODULO DOSÍMETRIA
            </span>
            </div>
        </div>
    </nav>
    <div class="container p-auto">
        <div class="row pt-5">
            <div class="col bg_warning"><h1> 1 de 3</h1></div>
            <div class="col bg_success">
                <div class="card card-body text-dark bg-light mt-4">
                <h1> 2 de 3</h1>
                    <h2 class="text-center">ASIGNAR DOSÍMETRO</h2>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="">CODIGO DOSÍMETRO:</label>
                            <select id="id_dosimetro" name="id_dosimetro" style="text-transform:uppercase;">
                                <option value="0">--SELECCIONE DOSIMETRO--</option>
                                <?php
                                    while($row1 = $resultado1->fetch_assoc()) {   ?>
                                        <option value="<?php echo $row1['id_dosimetro']; ?>"><?php echo $row1['tipo_dosimetro'].' - '.$row1['codigo_dosimeter']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <br>
                        <div class="form-group">
                          <label for=""></label>
                          <input type="numeric" name="nit_empresa" id="nit_empresa" class="form-control" placeholder="NIT/RUT DE LA INSTITUCIÓN A CREAR" autofocus style="text-transform:uppercase;">
                        </div>
                        
                        <br>
                        <div class="d-grid gap-2">
                            <input type="submit" class="btn btn-info" name="boton-guardar" value="GURDAR">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col bg_primary">
                <h1> 3 de 3</h1>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>