
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>

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
                <a class="nav-link active" aria-current="page" href="../asignar_dosimetro.html">ASIGNAR</a>
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
                <div class="col"></div>
                <div class="col">
                    <div class="card text-dark bg-light"  style="max-width: 25rem;">
                        <form class="m-4" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                            <label for="exampleFormControlInput1" class="form-label">BUSCAR: </label>
                            <select class="form-select form-select-sm"  name="tipo" id="tipo" autofocus style="text-transform:uppercase;">
                                <option value="0">-SELECCIONE-</option>
                                <option value="1">--EMPRESAS--</option>
                                <option value="2">--SEDES--</option>
                                <option value="3">--CONTACTOS--</option>
                                <option value="4">--TRABAJADORES--</option>
                                <option value="5">--DOSÍMETROS--</option>
                            </select>
                            
                            <br>
                            <label for="exampleFormControlInput1" class="form-label">PALABRA CLAVE: </label>
                            <input class="form-control" type="text" name="busqueda" id="busqueda" placeholder="--BUSCAR--" autofocus style="text-transform:uppercase;">  
                            <br>
                            <div class="row">
                                <div class="col"></div>
                                <div class="col">
                                    <input class="btn btn-primary " type="submit" id="submit" name="submit" value="BUSCAR">
                                </div>
                                <div class="col"></div>
                                
                            </div>
                        </form>
                    </div>
                </div>  
                <div class="col"></div>
            </div>
            <div class="row pt-5" id ="salida">
                <?php
                    require('conexion.php');
                    if(isset($_POST['submit'])){
                        $tipo = $_POST['tipo'];
                        $busqueda = $_POST['busqueda'];
                    
                        //////////////////////// BUSQUEDA Y GENERACION DE LA TABLA PARA EMPRESAS//////////////////////////////
                        if($tipo == '1'){
                            
                            $q1 = $mysqli->real_escape_string($busqueda);
                            $query1= "SELECT * FROM empresas WHERE 
                            nombre_empresa LIKE '%".$q1."%' OR 
                            nit_empresa LIKE '%".$q1."%' ";

                            $buscarEmpresa = $mysqli->query($query1);
                            if($buscarEmpresa->num_rows > 0){
                                echo "<h2 class='text-center mb-4'>BÚSQUEDA RELACIONADA CON EMPRESAS</h2>
                                
                                <table class='table table-hover table-bordered '>
                                        <thead>
                                            <tr>
                                                <th scope='col'>NOMBRE</th>
                                                <th scope='col'>NIT/RUT</th>
                                                <th scope='col'>TELÉFONO</th>
                                                <th scope='col'>CORREO</th>
                                                <th scope='col' style='width: 9.55%'>ACCIONES</th>
                                            </tr>
                                        </thead>";
                                while($filaEmpresas = $buscarEmpresa->fetch_assoc()){?> 
                                    <tr>
                                        <td><a class="link-dark" href="datos_empresa.html?id=<?php echo $filaEmpresas['id_empresa']?>"><?php echo $filaEmpresas['nombre_empresa']?></a></td>
                                        <td><?php echo $filaEmpresas['nit_empresa']      ?></td>
                                        <td><?php echo $filaEmpresas['telefono_empresa'] ?></td>
                                        <td><?php echo $filaEmpresas['correo_empresa']   ?></td>
                                        <td>
                                            <a href="../update_forms/edit_empresa.php?id=<?php echo $filaEmpresas['id_empresa']?>" class="btn btn-secondary">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                                                <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
                                                </svg>
                                            </a>
                                            <a href="../delete_forms/delete_empresa.php?id=<?php echo $filaEmpresas['id_empresa']?>" class="btn btn-danger">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                </svg>
                                            </a>
                                        </td>
                                    </tr>
                                <?php }
                            }else{
                                echo "<p>NO HAY DATOS :(</p>";
                            }
                        }
                        //////////////////////// BUSQUEDA Y GENERACION DE LA TABLA PARA SEDES//////////////////////////////
                        if($tipo == '2'){
                            
                            $q2 = $mysqli->real_escape_string($busqueda);
                            $query2 = "SELECT * FROM sede INNER JOIN empresas ON 
                            sede.id_empresa = empresas.id_empresa WHERE 
                            nombre_sede LIKE '%".$q2."%' OR 
                            nombre_empresa LIKE '%".$q2."%' OR 
                            municipio_sede LIKE '%".$q2."%' OR 
                            departamento_sede LIKE '%".$q2."%' ";

                            $buscarSedes = $mysqli->query($query2);
                            if($buscarSedes->num_rows > 0){
                                echo "<h2 class='text-center mb-4'>BÚSQUEDA RELACIONADA CON SEDES</h2>
                                <table class='table table-hover table-bordered'>
                                        <thead>
                                            <tr>
                                                <th scope='col'>EMPRESA</th>
                                                <th scope='col'>SEDE</th>
                                                <th scope='col'>MUNICIPIO</th>
                                                <th scope='col'>DEPARTAMENTO</th>
                                                <th scope='col'>DIRECCIÓN</th>
                                                <th scope='col' style='width: 9.55%'>ACCIONES</th>
                                            </tr>
                                        </thead>";
                                while($filaSede = $buscarSedes->fetch_assoc()){?> 
                                    <tr>
                                        <td><?php echo $filaSede['nombre_empresa']   ?></td> 
                                        <td><a class="link-dark" href="datos_empresa.html?id=<?php echo $filaSede['id_sede']?>"><?php echo $filaSede['nombre_sede']?></a></td>
                                        <td><?php echo $filaSede['municipio_sede']   ?></td>
                                        <td><?php echo $filaSede['departamento_sede']?></td>
                                        <td><?php echo $filaSede['direccion_sede']   ?></td>
                                        <td>
                                            <a href="" class="btn btn-secondary">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                                                <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
                                                </svg>
                                            </a>
                                            <a href="" class="btn btn-danger">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                </svg>
                                            </a>
                                        </td>
                                    </tr>
                                <?php }
                            }else{
                                echo "<p> NO HAY DATOS :(</p>";
                            }
                        }
                        //////////////////////// BUSQUEDA Y GENERACION DE LA TABLA PARA CONTACTOS//////////////////////////////
                        if($tipo == '3'){

                            $q3 = $mysqli->real_escape_string($busqueda);
                            $query3= "SELECT * FROM contactos INNER JOIN contactosede ON 
                            contactos.id_contacto = contactosede.id_contacto 
                            INNER JOIN sede ON contactosede.id_sede = sede.id_sede 
                            INNER JOIN empresas ON sede.id_empresa = empresas.id_empresa WHERE 
                            nombre_empresa LIKE '%".$q3."%' OR
                            nombre_sede LIKE '%".$q3."%' OR 
                            nombres_contacto LIKE '%".$q3."%' OR 
                            apellidos_contacto LIKE '%".$q3."%' OR 
                            correo_contacto LIKE '%".$q3."%' OR 
                            cargo_contacto LIKE '%".$q3."%'";

                            $buscarContacto = $mysqli->query($query3);
                            if($buscarContacto->num_rows > 0){
                                echo "<h2 class='text-center mb-4'>BÚSQUEDA RELACIONADA CON CONTACTOS</h2>
                                <table class='table table-hover table-bordered'>
                                        <thead>
                                            <tr>
                                                <th scope='col'>EMPRESA</th>
                                                <th scope='col'>SEDE</th>
                                                <th scope='col'>NOMBRES</th>
                                                <th scope='col'>APELLIDOS</th>
                                                <th scope='col'>CORREO</th>
                                                <th scope='col'>TELÉFONO</th>
                                                <th scope='col'>CARGO</th>
                                                <th scope='col' style='width: 9.55%'>ACCIONES</th>
                                            </tr>
                                        </thead>";
                                while($filaContactos= mysqli_fetch_array ($buscarContacto)){?> 
                                   <tr>
                                        <td><?php echo $filaContactos['nombre_empresa'] ?></td>
                                        <td><?php echo $filaContactos['nombre_sede'] ?></td>
                                        <td><a class="link-dark" href="datos_empresa.html?id=<?php echo $filaContactos['id_contacto']?>"><?php echo $filaContactos['nombres_contacto']?></a></td>
                                        <td><?php echo $filaContactos['apellidos_contacto'] ?></td>
                                        <td><?php echo $filaContactos['correo_contacto']    ?></td>
                                        <td><?php echo $filaContactos['telefono_contacto']  ?></td>
                                        <td><?php echo $filaContactos['cargo_contacto']     ?></td>
                                        <td>
                                            <a href="" class="btn btn-secondary">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                                                <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
                                                </svg>
                                            </a>
                                            <a href="" class="btn btn-danger">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                </svg>
                                            </a>
                                        </td>
                                    </tr>
                            <?php }
                            }else{
                                echo "<p>NO HAY DATOS :(</p>";
                            }
                        }
                        //////////////////////// BUSQUEDA Y GENERACION DE LA TABLA PARA TRABAJADORES//////////////////////////////
                        
                        if($tipo == '4'){

                            $q4 = $mysqli->real_escape_string($busqueda);
                            $query4= "SELECT * FROM trabajador INNER JOIN trabajadorsede ON trabajador.id_trabajador = trabajadorsede.id_trabajador 
                            INNER JOIN sede ON trabajadorsede.id_sede = sede.id_sede 
                            INNER JOIN empresas ON sede.id_empresa = empresas.id_empresa WHERE 
                            nombre_empresa LIKE '%".$q4."%' OR 
                            nombre_sede LIKE '%".$q4."%' OR 
                            nombre_trabajador LIKE '%".$q4."%' OR 
                            cedula_trabajador LIKE '%".$q4."%' OR 
                            tipo_trabajador LIKE '%".$q4."%'OR 
                            genero_trabajador LIKE '%".$q4."%'";

                            $buscarTrabajador = mysqli_query($mysqli, $query4);
                            //$buscarTrabajador = $mysqli->query($query4);
                            //echo $buscarTrabajador;
                            if($buscarTrabajador->num_rows > 0){
                                echo "<h2 class='text-center mb-4'>BÚSQUEDA RELACIONADA CON TRABAJADORES</h2>
                                <table class='table table-hover table-bordered'>
                                        <thead>
                                            <tr>
                                                <th scope='col'>EMPRESA</th>
                                                <th scope='col'>SEDE</th>
                                                <th scope='col'>NOMBRE</th>
                                                <th scope='col'>CEDULA</th>
                                                <th scope='col'>TELÉFONO</th>
                                                <th scope='col'>GÉNERO</th>
                                                <th scope='col'>TIPO DE TRABAJADOR</th>
                                                <th scope='col' style='width: 9.55%'>ACCIONES</th>
                                            </tr>
                                        </thead>";
                                while($filaTrabajador = mysqli_fetch_array ($buscarTrabajador)){?> 
                                    <tr>
                                    
                                        <td><?php echo $filaTrabajador['nombre_empresa']     ?></td>
                                        <td><?php echo $filaTrabajador['nombre_sede']        ?></td>
                                        <td><a class="link-dark" href="datos_empresa.html?id=<?php echo $filaTrabajador['id_trabajador']?>"><?php echo $filaTrabajador['nombre_trabajador']?></a></td>
                                        <td><?php echo $filaTrabajador['cedula_trabajador']  ?></td>
                                        <td><?php echo $filaTrabajador['telefono_trabajador']?></td>
                                        <td><?php echo $filaTrabajador['genero_trabajador']  ?></td>
                                        <td><?php echo $filaTrabajador['tipo_trabajador']    ?></td>
                                        <td>
                                            <a href="" class="btn btn-secondary">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                                                <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
                                                </svg>
                                            </a>
                                            <a href="" class="btn btn-danger">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                </svg>
                                            </a>
                                        </td>
                                        
                                    </tr>
                                
                                <?php }
                            }else{
                                echo "<p>NO HAY DATOS :(</p>";
                            }   
                        }
                        //////////////////////// BUSQUEDA Y GENERACION DE LA TABLA PARA DOSIMETROS//////////////////////////////
                        if($tipo == '5'){
                            $q5 = $mysqli->real_escape_string($busqueda);
                            $query5= "SELECT * FROM dosimetro INNER JOIN trabajadordosimetro ON 
                            dosimetro.id_dosimetro = trabajadordosimetro.id_dosimetro INNER JOIN trabajadorsede ON 
                            trabajadordosimetro.id_trabajador = trabajadorsede.id_trabajador INNER JOIN trabajador ON 
                            trabajadorsede.id_trabajador = trabajador.id_trabajador INNER JOIN sede ON 
                            trabajadorsede.id_sede = sede.id_sede INNER JOIN empresas ON 
                            sede.id_empresa = empresas.id_empresa WHERE 
                            nombre_empresa LIKE '%".$q5."%' OR 
                            nombre_sede LIKE '%".$q5."%' OR 
                            nombre_trabajador LIKE '%".$q5."%' OR 
                            codigo_dosimeter LIKE '%".$q5."%' OR 
                            tipo_dosimetro LIKE '%".$q5."%' OR 
                            ocupacion LIKE '%".$q5."%' OR 
                            periodo_recambio LIKE '%".$q5."%' OR 
                            fecha_ingreso_servicio LIKE '%".$q5."%'";

                            $buscarDosimetro = mysqli_query($mysqli, $query5);
                            if($buscarDosimetro->num_rows > 0){
                                echo "<h2 class='text-center mb-4'>BÚSQUEDA RELACIONADA CON DOSÍMETROS</h2>
                                <table class='table table-hover table-bordered'>
                                        <thead>
                                            <tr>
                                                <th scope='col'>EMPRESA</th>
                                                <th scope='col'>SEDE</th>
                                                <th scope='col'>NOMBRE TRABAJADOR ASIGNADO</th>
                                                <th scope='col'>CÓDIGO</th>
                                                <th scope='col'>TIPO DOSÍMETRO</th>
                                                <th scope='col'>OCUPACIÓN</th>
                                                <th scope='col'>PERÍODO DE RECAMBIO</th>
                                                <th scope='col'>FECHA INGRESO AL SERVICIO</th>
                                                <th scope='col' style='width: 9.55%'>ACCIONES</th>
                                            </tr>
                                        </thead>";
                                while($filaDosimetro = mysqli_fetch_array ($buscarDosimetro)){?> 
                                    <tr>
                                    
                                        <td><?php echo $filaDosimetro['nombre_empresa'] ?></td>
                                        <td><?php echo $filaDosimetro['nombre_sede'] ?></td>
                                        <td><?php echo $filaDosimetro['nombre_trabajador'] ?></td>
                                        <td><a class="link-dark" href="datos_empresa.html?id=<?php echo $filaDosimetro['id_dosimetro']?>"><?php echo $filaDosimetro['codigo_dosimeter']?></a></td>
                                        <td><?php echo $filaDosimetro['tipo_dosimetro'] ?></td>
                                        <td><?php echo $filaDosimetro['ocupacion']    ?></td>
                                        <td><?php echo $filaDosimetro['periodo_recambio']     ?></td>
                                        <td><?php echo $filaDosimetro['fecha_ingreso_servicio']  ?></td>
                                        <td>
                                            <a href="" class="btn btn-secondary">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                                                <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
                                                </svg>
                                            </a>
                                            <a href="" class="btn btn-danger">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                </svg>
                                            </a>
                                        </td>
                                    </tr>
                                
                                <?php }       
                            }else{
                                echo "<p>NO HAY DATOS :(</p>";
                            }  
                        }
                    }else{
                        $query0 = "SELECT * FROM empresas ORDER BY nombre_empresa ASC";
                        $buscarEmpresa0 = $mysqli->query($query0);    

                        if($buscarEmpresa0->num_rows > 0){
                            echo "<h2 class='text-center mb-4'>TODAS LAS EMPRESAS</h2>
                            <table class='table table-hover table-bordered'>
                                    <thead>
                                        <tr>
                                            <th scope='col'>NOMBRE</th>
                                            <th scope='col'>NIT/RUT</th>
                                            <th scope='col'>TELÉFONO</th>
                                            <th scope='col'>CORREO</th>
                                            <th scope='col' style='width: 9.55%'>ACCIONES</th>
                                        </tr>
                                    </thead>";
                            while($filaEmpresas0 = $buscarEmpresa0->fetch_assoc()){?> 
                                <tr>
                                    <td><a class="link-dark" href="datos_empresa.html?id=<?php echo $filaEmpresas0['id_empresa']?>"><?php echo $filaEmpresas0['nombre_empresa']?></a></td>
                                    <td><?php echo $filaEmpresas0['nit_empresa']      ?></td>
                                    <td><?php echo $filaEmpresas0['telefono_empresa'] ?></td>
                                    <td><?php echo $filaEmpresas0['correo_empresa']   ?></td>
                                    <td>
                                        <a href="../update_forms/edit_empresa.php?id=<?php echo $filaEmpresas0['id_empresa']?>" class="btn btn-secondary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                                            <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
                                            </svg>
                                        </a>
                                        <a href="../delete_forms/delete_empresa.php?id=<?php echo $filaEmpresas0['id_empresa']?>" class="btn btn-danger">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                            <?php } 
                        }
                    }
                ?>
            </div>
        </div>
 
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="../js/bootstrap.min.js"></script>
    </body>