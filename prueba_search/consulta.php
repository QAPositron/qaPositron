<?php
    require('conexion.php');
    //$tabla="";
    //$query = "SELECT * FROM empresas ORDER BY nombre_empresa ASC";

    $tipo = $_POST['tipo'];
    $busqueda = $_POST['busqueda'];

    echo $tipo ,$busqueda;
    /// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT// 
/*
    if(isset($_POST['empresas'])){
       
        //$q = $mysqli->real_escape_string($_POST['empresas']);
        //$query= "SELECT * FROM empresas WHERE 
        //id_empresa LIKE '%".$q."%' OR 
        //nombre_empresa LIKE '%".$q."%' OR 
        //nit_empresa LIKE '%".$q."%' ";
    }
/*
    $buscarEmpresa = $mysqli->query($query);
    if($buscarEmpresa->num_rows > 0){
        $tabla.='<table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">NOMBRE</th>
                            <th scope="col"> NIT/RUT</th>
                            <th scope="col">TELEFONO</th>
                            <th scope="col">CORREO</th>
                            <th scope="col">ACCIONES</th>
                        </tr>
                    </thead>';
        while ($filaEmpresas = $buscarEmpresa->fetch_assoc()){
            $tabla.='<tr>
                        <td><a class="link-dark" href="../update_forms/edit_empresa.php?id=<?php echo $row["id_empresa"]?>'.$filaEmpresas['nombre_empresa'].'</a></td>
                        <td>'.$filaEmpresas['nit_empresa'].'</td>
                        <td>'.$filaEmpresas['telefono_empresa'].'</td>
                        <td>'.$filaEmpresas['correo_empresa'].'</td>
                        <td> 
                        </td>
                    </tr>';
        }
        $tabla.='</table>';
    }else{
        $tabla.="NO HAY DATOS :(";
    }

    echo $tabla;
    //$mysqli-> lose();*/
?>