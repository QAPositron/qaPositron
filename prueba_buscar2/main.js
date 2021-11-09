$('#enviar').click(regresar);

function regresar(){

    $.ajax({
        url: 'consulta1.php',
        type: 'post',
        dataType: 'json',
        data:{
            tipo: $('#tipo').val(),
            busqueda: $('#busqueda').val()
        },
        success:function(r){
            
            $('#salida').html(r);
        }
    });/*.done(
        function(data){
            $('#salida').append(data[0]);
            $('#tipo');
            $('#busqueda');
        }
    );*/
}

/*



$(document).ready(function(){
    enviarDatos();
});
    function enviarDatos(){
        $('#form').submit(function (e) {
            e.preventDefault();

            var data = $(this).serialize();
           
            $.ajax({
                type: "post",
                url: "consulta1.php",
                data: data,
                dataType: "json",
                success: function (response) {
                $('#tabla_resultado').html(response); 
                }
            });
        });
    }
*/