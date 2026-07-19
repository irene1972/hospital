<?php
class MySQLdb{
    private $host="localhost";
    private $usuario="root";
    private $clave="root";
    private $db="hospital";
    private $puerto="";
    private $conn;

    function __construct(){
        try{
            $this->conn=new PDO(
                'mysql:host='.$this->host.';dbname='.$this->db,
                $this->usuario,
                $this->clave
            );
        }catch(Exception $e){
            die("no se pudo conectar: " . $e->getMessage());
        }
    }
}
?>