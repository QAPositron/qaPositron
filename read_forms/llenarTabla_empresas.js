function llenarTablaEmpresas(id_empresa){
    if(id_empresa==0){
        var cadena="sql= SELECT * FROM empresas ORDER BY nombre_empresa ASC";
    }else{
        var cadena="sql= SELECT * FROM empreas WHERE id_empresa="+id_empresa+"ORDER BY nombre_empresa ASC";
    }
    $.ajax({
        tyoe:"POST",
        url:"llenarTablaEmpresas.php",
        data: cadena,
        succes:function(r){
            $('#tabla').html(r);
        },
        error:function(r){
            alertify.error("Error al cargar las empresas"+r);
        }
    });
}