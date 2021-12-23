<?php

if(isset($_REQUEST['registrar_cliente'])){
    //echo "bien";
    include_once('controllers/ClienteController.php');
    $ClienteController = new ClienteController();
    $ClienteController -> RegistrarCliente();
    
}

if(isset($_REQUEST['eliminar_cliente'])){
    //echo "bien";
    include_once('controllers/ClienteController.php');
    $ClienteController = new ClienteController();
    $ClienteController -> EliminarCliente();
    
}

if(isset($_REQUEST['actualizar_cliente'])){
    //echo "bien";
    include_once('controllers/ClienteController.php');
    $ClienteController = new ClienteController();
    $ClienteController -> ActualizarCliente();
    
}
?>