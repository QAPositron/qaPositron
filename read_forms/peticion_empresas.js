$(document).ready(function(){
    obtener_registros();
})

function obtener_registros(empresas) 
{ 
    $.ajax({
        url : 'consulta_empresas.php',
        type : 'POST',
        dataType : 'html',
        data : { empresas: empresas, tipo: tipo}
    })
    .done(function(resultado){
        $("#tabla_resultado").html(resultado);
    })
}

$(document).on('keyup', '#busqueda', function()
{
    var valorBusqueda = $(this).val();
    if(valorBusqueda!="")
    {
         obtener_registros(valorBusqueda);
    }
    else
    {
         obtener_registros();
    }
}); 