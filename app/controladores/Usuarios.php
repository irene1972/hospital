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
	public function alta()
	{
		$data = [];
		$errores = [];
		$tiposUsuarios = $this->modelo->getTiposUsuarios();
    	$generos = $this->modelo->getGeneros();
    	$estadosUsuarios = $this->modelo->getEstadosUsuarios();
    	$datos = [
	      "titulo" => "Alta de un usuario",
	      "subtitulo" => "Alta de un usuario",
	      "activo" => "usuarios",
	      "usuario"=>$this->usuario,
	      "menu" => true,
	      "admon" => true,
	      "errores" => $errores,
	      "tiposUsuarios" => $tiposUsuarios,
	      "estadosUsuarios" => $estadosUsuarios,
	      "generos" => $generos,
	      "data" => $data
	    ];
		//Helper::mostrar($datos);
	    $this->vista("usuariosAltaVista",$datos);
	}
	public function caratula()
	{
		$data=$this->modelo->getTabla();
		$errores=[];
		$datos = [
			"titulo" => "Usuarios",
			"subtitulo" => "Usuarios",
			"usuario"=>$this->usuario,
			"activo"=>"usuarios",
			"data"=>[$data],
			"errores" =>$errores,
			"menu" => true
		];
		$this->vista("usuariosCaratulaVista",$datos);
	}
	
}



?>