
    <?php  
        
        
        $tipo = $_POST['tipo'];    
        $busqueda = $_POST['busqueda'];
        
       
        $datos[] = [$tipo, $busqueda];

        $obj = json_decode($datos);

        
        //echo json_encode($datos);
        // $tabla.='<table class="table table-hover table-bordered">
        //              <thead>
        //              <tr>
        //                 <th scope="col">tipo</th>
        //                 <th scope="col"> busqueda</th>
        //             </thead>';
        //             while($result = $datos->fetch_assoc()){
        //                 $tabla.=    '<tr>
        //                                 <td>'.$result[0].'</td>
        //                                 <td>'.$result[1].'</td>
        //                             </tr>';
        //             }
        // $tabla.='</table>';
        // echo $tabla;

?>
        <!-- if($tipo==0){
        //     $query1 = "SELECT * FROM empresas ORDER BY nombre_empresa ASC";
        //     $result1 =$mysqli->query($query1);
        //     $tabla.='<table class="table table-hover table-bordered">
        //             <thead>
        //                 <tr>
        //                     <th scope="col">NOMBRE</th>
        //                     <th scope="col"> NIT/RUT</th>
        //                     <th scope="col">TELEFONO</th>
        //                     <th scope="col">CORREO</th>
        //                     <th scope="col">ACCIONES</th>
        //                 </tr>
        //             </thead>';
        //         while ($filaEmpresas = $result1->fetch_assoc()){
        //             $tabla.='<tr>
        //                         <td><a class="link-dark" href="../update_forms/edit_empresa.php?id=<?php echo $row["id_empresa"]?>'.$filaEmpresas['nombre_empresa'].'</a></td>
        //                        <td>'.$filaEmpresas['nit_empresa'].'</td>
        //                         <td>'.$filaEmpresas['telefono_empresa'].'</td>
        //                         <td>'.$filaEmpresas['correo_empresa'].'</td>
        //                         <td> 
        //                         </td>
        //                     </tr>';
        //         }
        //         $tabla.='</table>';
        //     }
        //     echo $tabla;
        

    ?>
