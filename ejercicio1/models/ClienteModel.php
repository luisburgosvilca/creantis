<?php
    include_once('controllers/SecurityController.php');
    class ClienteModel extends SecurityController{
        
        function getClientes()
        {
            $conn = $this->getConnection();

            $query = "SELECT * FROM clientes WHERE estado = 'ACTIVO'";
            $result = $conn ->query($query);
            $conn->close();

            return $result;
        }

        function RegistrarCliente($data)
        {
            $dni        = $data['dni'];
            $nombre     = $data['nombre'];
            $apellido   = $data['apellido'];
            $email      = $data['email'];
            $direccion  = $data['direccion'];

            $conn = $this->getConnection();

            $query = "INSERT INTO clientes (dni,nombre,apellido,email,direccion) values ('$dni','$nombre','$apellido','$email','$direccion')";
            $result = $conn ->query($query);

            return $result;
            $conn->close();
        }

        function EliminarCliente($data)
        {
            $cliente_id = $data['cliente_id'];

            $conn = $this->getConnection();

            $query = "UPDATE clientes SET estado ='INACTIVO' where cliente_id = '$cliente_id'";
            $result = $conn ->query($query);

            return $result;

        }

        function ActualizarCliente($data)
        {
            $cliente_id = $data['cliente_id'];
            $dni        = $data['dni'];
            $nombre     = $data['nombre'];
            $apellido   = $data['apellido'];
            $email      = $data['email'];
            $direccion  = $data['direccion'];
            
            $conn = $this->getConnection();

            $query = "UPDATE clientes SET dni='$dni', nombre='$nombre', apellido= '$apellido', email= '$email', direccion = '$direccion' WHERE cliente_id = '$cliente_id'";
            $result = $conn ->query($query);

            return $result;
            $conn->close();
        }
    }

?>