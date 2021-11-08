<?php
    require('conexion.php');
     $tabla="";
     $query="SELECT * FROM empresas ORDER BY id_empresa ASC";

     /// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT//

     if(isset($_POST['empresas'])){

        $q = $mysqli->real_escape_string($_POST['empresas']);
        $query = "SELECT * FROM empresas WHERE 
        id_empresa LIKE '%".$q."%' OR 
        nombre_empresa LIKE '%".$q."%' OR 
        nit_empresa LIKE '%".$q."%' ";
     }

     $buscarEmpresa = $mysqli->query($query);
     if($buscarEmpresa->num_rows > 0){
         $tabla.= '<table class="table table-hover table-sm">
                        <tr class="bg-success">
                            <th scope="col">NOMBRE</th>
                            <th scope="col"> NIT/RUT</th>
                            <th scope="col">TELEFONO</th>
                            <th scope="col">CORREO</th>
                        </tr>';
        while($filaEmpresas = $buscarEmpresa->fetch_assoc()){
            $tabla.='<tr>
                        <td>'.$filaEmpresas['nombre_empresa'].'</td>
                        <td>'.$filaEmpresas['nit_empresa'].'</td>
                        <td>'.$filaEmpresas['telefono_empresa'].'</td>
                        <td>'.$filaEmpresas['correo_empresa'].'</td>
                    </tr>';
        } 
        $tabla.='</table>';   
     }else{
        $tabla="NO SE ENCONTRARON COINCIDENCIAS EN LA BUSQUEDA";
     }

    echo $tabla;
?>