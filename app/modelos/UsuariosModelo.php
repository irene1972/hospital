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