<?php  
/**
 * 
 */
class UsuariosModelo
{
	private $db;
	
	function __construct()
	{
		$this->db = new MySQLdb();
	}
	public function alta(array $data=[]):int
	{
		$salida = 0;
		$sql = "INSERT INTO usuarios VALUES(0,"; //1. id 
		$sql.= "'".$data['nombres']."', "; 		//2. nombre
		$sql.= "'".$data['apellidos']."', "; 	//3. apellidos
		$sql.= "'".$data['correo']."', "; 		//4. correo
		$sql.= "'".$data['clave']."', "; 		//5. clave
		$sql.= "'".$data['telefono']."', "; 	//6. telefono
		$sql.= "'".$data['tipoUsuario']."', "; 	//7. tipoUsuario
		$sql.= "'".$data['estadoUsuario']."', ";//8. estadoUsuario
		$sql.= "'".$data['genero']."', "; 		//9. genero
		//
		$sql.= "0, ";                   //10. baja
		$sql.= "NOW(), ";                  //11. fecha login
		$sql.= "NOW(), ";               //12. fecha alta
		$sql.= "NOW(), ";                  //13. fecha baja 
		$sql.= "NOW())";                   //14. fecha cambio
	   	if($this->db->queryNoSelect($sql)){
			$salida = $this->db->query("SELECT LAST_INSERT_ID()");
			$salida = $salida["LAST_INSERT_ID()"];
		}
		return $salida;
	}
	public function bajaLogica(string $id):bool
	{
		$sql = "UPDATE usuarios SET baja=1, baja_dt=(NOW()) WHERE id=".$id;
		return $this->db->queryNoSelect($sql);
	}
	public function getCorreo(string $correo=''):array | null
	{
		if(empty($correo)) return null;
		$sql = "SELECT id FROM usuarios WHERE correo='".$correo."' AND baja=0";
		return $this->db->query($sql);
	}
	public function getId(string $id=''):array
	{
		if(empty($id)) return null;
		$sql = "SELECT id, tipoUsuario, nombres, apellidos, telefono, ";
		$sql.= "correo, clave, genero, estadoUsuario FROM usuarios ";
		$sql.= "WHERE id='".$id."' AND baja=0";
		return $this->db->query($sql);
	}
	public function getTabla(){
		$sql = "SELECT u.id, CONCAT(u.apellidos,', ',u.nombres) as nombre, ";
		$sql.= "tu.tipo, eu.estado ";
		$sql.= "FROM usuarios as u, tipoUsuario as tu, estadoUsuario as eu ";
		$sql.= "WHERE u.baja=0 AND ";
		$sql.= "u.estadoUsuario=eu.id AND ";
		$sql.= "u.tipoUsuario=tu.id";
		return $this->db->querySelect($sql);
	}
	public function getTiposUsuarios():array
	{
		//
		$sql = "SELECT id, tipo FROM tipoUsuario";
		return $this->db->querySelect($sql);
	}

	public function getEstadosUsuarios():array
	{
		//
		$sql = "SELECT id, estado FROM estadoUsuario";
		return $this->db->querySelect($sql);
	}

	public function getGeneros():array
	{
		//
		$sql = "SELECT id, genero FROM generos";
		return $this->db->querySelect($sql);
	}
}


?>