<?php

class ClientesPartial {

    public function MostrarClientesPartial($clientes)
    {
        ?>

        <script>
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
        </script>

        <table class="table table-striped table-sm table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">DNI</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Email</th>
                <th scope="col">Dirección</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <tbody>
            <?php

                foreach ($clientes as $cliente){
                //echo $cliente['dni']."<br>";
                ?>
                <tr>
                <td><?php echo $cliente['cliente_id']?></td>
                <td><?php echo $cliente['dni']?></td>
                <td><?php echo $cliente['nombre']?></td>
                <td><?php echo $cliente['apellido']?></td>
                <td><?php echo $cliente['email']?></td>
                <td><?php echo $cliente['direccion']?></td>
                <td>
                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editar_cliente" id="btn_editar_cliente"
                        data-cliente_id="<?php echo $cliente['cliente_id']?>"
                        data-dni="<?php echo $cliente['dni']?>"
                        data-nombre="<?php echo $cliente['nombre']?>"
                        data-apellido="<?php echo $cliente['apellido']?>"
                        data-email="<?php echo $cliente['email']?>"
                        data-direccion="<?php echo $cliente['direccion']?>"
                        ><i class="fas fa-pencil-alt"></i></button>

                    <button type="button" class="btn btn-danger btn-sm" id="eliminar_cliente"
                        data-cliente_id="<?php echo $cliente['cliente_id']?>"
                        data-dni="<?php echo $cliente['dni']?>"
                        data-nombre="<?php echo $cliente['nombre']?>"
                        data-apellido="<?php echo $cliente['apellido']?>"
                        data-email="<?php echo $cliente['email']?>"
                        data-direccion="<?php echo $cliente['direccion']?>"
                        ><i class="fas fa-trash"></i></button>
                </td>
                </tr>
                <?php
                }

            ?>
            </tbody>
        </table>

        <?php
    }

}

?>