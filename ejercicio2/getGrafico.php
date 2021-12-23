<?php

if(isset($_REQUEST['generar_grafico'])){
    //echo "bien";
    include_once('controllers/MainController.php');
    $MainController = new MainController();
    $MainController -> GenerarGrafico();

}

?>