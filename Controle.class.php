<?php

class Controle{

    function MyAutoLoad($className){
        $extension = spl_autoload_extensions();
        require_once(__DIR__ . '/' . $className . $extension);
    }

    spl_autoload_extensions('.class.php');
    spl_autoload_register('MyAutoLoad');

    private $connection = new Connection();
    public $conn;

    public function __construct(){
        $conn = $connection->getInstance();
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