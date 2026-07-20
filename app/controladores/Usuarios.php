<?php  
/**
 * 
 */
class Usuarios extends Controlador
{
	protected $modelo = "";
	protected $sesion;
	protected $usuario;
	
	function __construct()
	{
		$this->sesion = new Sesion();
		if ($this->sesion->getLogin()) {
			$this->modelo = $this->modelo("UsuariosModelo");
			$this->usuario = $this->sesion->getUsuario();
		} else {
			header("location:".RUTA);
		}
	}

	public function caratula()
	{
		$datos = [
			"titulo" => "Usuarios",
			"subtitulo" => "Usuarios",
			"usuario"=>$this->usuario,
			"activo"=>"usuarios",
			"data"=>[],
			"errores" =>[],
			"menu" => true
		];
		$this->vista("usuariosCaratulaVista",$datos);
	}
	
}



?>