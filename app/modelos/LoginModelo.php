<?php  
/**
 * 
 */
class LoginModelo
{
	private $db;
	
	function __construct()
	{
		$this->db = new MySQLdb();
	}

	public function actualizarClaveAcceso(array $data=[]):bool
	{
		if (empty($data)) return null;
		$sql = "UPDATE usuarios SET clave=:clave WHERE id=:id";
		return $this->db->queryNoSelect($sql,$data);
	}

	public function buscarCorreo(string $correo=''):array
	{
		$sql = "SELECT id, nombres, apellidos, correo, clave, telefono, ";
		$sql.= "estadoUsuario, tipoUsuario, genero ";
		$sql.= "FROM usuarios ";
	 	$sql.= "WHERE correo = '".$correo."' AND baja=0";
	 	return $this->db->query($sql);
	}
}


?>