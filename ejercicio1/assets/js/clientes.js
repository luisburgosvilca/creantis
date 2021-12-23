$(document).ready(function(){

        // 1. Abrir popUp Registrar Cliente
        $('#btn_registrar_cliente').click(function() {
            //LimpiarCampos();
            var dni     = $("#dni").val();
            nombre      = $("#nombre").val();
            apellido    = $("#apellido").val();
            email       = $("#email").val();
            direccion   = $("#direccion").val();

            //alert(nombre);

            // if(dni=='' || nombre=='' || apellido=='' || email =='' || direccion ==''){
            //     alert('Debe completar todos los campos');
            // }else{
                $("#resultado").html("<center><img height='100%' class='img img-responsive center-block' src='assets/images/loading.gif'/>Registrando</center>");
                $.ajax({
                    type:       'POST',
                    dataType:   'html',
                    url:        'getCliente.php',
                    data:       {registrar_cliente:'registrar_cliente', dni: dni, nombre: nombre, apellido: apellido, email: email, direccion: direccion},
                    success: function(wait_for_confirmation){
                        $("#resultado").html(wait_for_confirmation);
                        LimpiarCampos();

                    }
                });
            //LimpiarCampos();
           // }
        });

        $('body').on("click", "button[id=btn_editar_cliente]", function(e) {

            var cliente_id      = $(this).data("cliente_id");
            var dni             = $(this).data("dni");
            var nombre          = $(this).data("nombre");
            var apellido        = $(this).data("apellido");
            var email           = $(this).data("email");
            var direccion       = $(this).data("direccion");


              $("#cliente_id_modal").val(cliente_id);
              $("#dni_modal").val(dni);
              $("#nombre_modal").val(nombre);
              $("#apellido_modal").val(apellido);
              $("#email_modal").val(email);
              $("#direccion_modal").val(direccion);

        });

        $("button[id=eliminar_cliente]").bind("click",function (){

            var cliente_id      = $(this).data("cliente_id");
            var dni             = $(this).data("dni");
            var nombre          = $(this).data("nombre");
            var apellido        = $(this).data("apellido");
            var email           = $(this).data("email");
            var direccion       = $(this).data("direccion");

            if(confirm('¿Desea eliminar al cliente: ' + nombre + '?')){

                $("#resultado").html("<center><img height='100%' class='img img-responsive center-block' src='assets/images/loading.gif'/>Eliminando</center>");
                $.ajax({
                    type:       'POST',
                    dataType:   'html',
                    url:        'getCliente.php',
                    data:       {eliminar_cliente:'eliminar_cliente', cliente_id: cliente_id},
                    success: function(wait_for_confirmation){
                        $("#resultado").html(wait_for_confirmation);
                 
                    }
                });

            }else{
               // alert('No eliminar');
            }
        });

        $("#btn_actualizaar_cliente").click(function(){

            var cliente_id = $("#cliente_id_modal").val(); 
            dni         = $("#dni_modal").val();
            nombre      = $("#nombre_modal").val();
            apellido    = $("#apellido_modal").val();
            email       = $("#email_modal").val();
            direccion   = $("#direccion_modal").val();

            $("#resultado").html("<center><img height='100%' class='img img-responsive center-block' src='assets/images/loading.gif'/>Actualizando</center>");
            $.ajax({
                type:       'POST',
                dataType:   'html',
                url:        'getCliente.php',
                data:       {actualizar_cliente:'actualizar_cliente', cliente_id: cliente_id,dni:dni, nombre:nombre, apellido:apellido, email:email, direccion:direccion},
                success: function(wait_for_confirmation){
                    $("#resultado").html(wait_for_confirmation);
             
                }
            });            

        });

})



function LimpiarCampos(){

    document.getElementById("dni").value="";
    document.getElementById("nombre").value="";
    document.getElementById("apellido").value="";
    document.getElementById("email").value="";
    document.getElementById("direccion").value="";

}