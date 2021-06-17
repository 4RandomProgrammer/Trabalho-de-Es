<?php

class Controle{

    private $connection = new Connection();
    public $conn;

    public function __construct(){
        $conn = self::$connection->getInstance();
    }

    public function insertBD($conexao, $query){
        if(mysqli_query($conexao, $query)){
            return true;
        }
        else return false;
    }

    public function deleteBD($conexao, $query){
        if(mysqli_query($conexao, $query)){
            return true;
        }
        else return false;
    }

    

}

?>