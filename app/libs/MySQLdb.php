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
    public function query(string $sql=''){
        if(empty($sql)) return null;
        $stmt=$this->conn->query($sql);
        $salida=$stmt->fetch(PDO::FETCH_ASSOC);
        if($salida){
            return $salida;
        }
        return [];
    }
    public function querySelect(string $sql=''):array | null
	{
		if (empty($sql)) return null;
		$data = [];
		$stmt = $this->conn->query($sql);
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		do {
	       array_push($data,$row);
	   } while ($row = $stmt->fetch(PDO::FETCH_ASSOC));
	   if (!$data[0]) {
		 $data = [];
	   }
	   return $data;
	}
    public function queryNoSelect(string $sql,array $data=[]):bool
	{
		$salida = false;
		if (empty($data)) {
			if($this->conn->query($sql)) $salida = true;
		} else {
			if($this->conn->prepare($sql)->execute($data)) $salida = true;
		}
		return $salida;
	}
}
?>