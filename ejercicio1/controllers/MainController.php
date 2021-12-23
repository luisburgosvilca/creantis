<?php

    class MainController{

        public function ClientesController(){

            include_once('models/ClienteModel.php');
            $ClienteModel = new ClienteModel();
            $clientes = $ClienteModel -> getClientes();

            include_once('views/ClientesView.php');
            $ClientesView = new ClientesView();
            $ClientesView -> FormularioClientesView($clientes);

        }
    }

?>