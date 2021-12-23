<?php

include_once('controllers/DataCN.php');
class SecurityController extends DataCN{

    public function getConnection(){

        $conn = mysqli_connect(DataCN::server,DataCN::user,DataCN::password, DataCN::database) or die(mysqli_errno().": ".mysqli_error());
        return $conn;

    }

    public function CerrarConexion($result,$conn){

        mysqli_free_result($result);
        mysqli_close($conn);

    }
    
}