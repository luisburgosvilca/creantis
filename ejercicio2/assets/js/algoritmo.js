$(document).ready(function(){

        // 1. Abrir popUp Registrar Cliente
        $("#numero").on("change",function(){

            var numero = $("#numero").val();

            $("#resultado").html("<center><img height='100%' class='img img-responsive center-block' src='assets/images/loading.gif'/>Generando gráfico</center>");
            $.ajax({
                type:       'POST',
                dataType:   'html',
                url:        'getGrafico.php',
                data:       {generar_grafico:'generar_grafico', numero: numero},
                success: function(wait_for_confirmation){
                    $("#resultado").html(wait_for_confirmation);

                }
            });

        });


})