<?php

class ClienteController{


    public function getDatosCliente()
    {
        $data['cliente_id']= isset($_POST['cliente_id'])?$_POST['cliente_id']: NULL;
        $data['dni']       = $_POST['dni'];
        $data['nombre']    = $_POST['nombre'];
        $data['apellido']  = $_POST['apellido'];
        $data['email']     = $_POST['email'];
        $data['direccion'] = $_POST['direccion'];
        
        return $data;
    }

    public function RegistrarCliente()
    {

        $data = $this->getDatosCliente();

       include_once('models/ClienteModel.php');
       $ClienteModel = new ClienteModel();

       if($ClienteModel -> RegistrarCliente($data)){
        //echo 1;

        $this->MostrarClientes();

       }
       else{
           echo "Hubo un error";
       }

    }

    public function EliminarCliente()
    {
        $data['cliente_id'] = $_POST['cliente_id'];

        include_once('models/ClienteModel.php');
        $ClienteModel = new ClienteModel();
        $ClienteModel -> EliminarCliente($data);

        $this->MostrarClientes();

    }

    public function MostrarClientes()
    {
        include_once('models/ClienteModel.php');
        $ClienteModel = new ClienteModel();
        $clientes = $ClienteModel -> getClientes();

        //echo "Hola";

        include_once('views/partials/ClientesPartial.php');
        $ClientesPartial = new ClientesPartial();
        $ClientesPartial -> MostrarClientesPartial($clientes);

    }

    public function ActualizarCliente()
    {

        $data = $this->getDatosCliente();

       include_once('models/ClienteModel.php');
       $ClienteModel = new ClienteModel();

       if($ClienteModel -> ActualizarCliente($data)){
        //echo 1;

        $this->MostrarClientes();

       }
       else{
           echo "Hubo un error";
       }        

    }

}

?>