<?php  
/**
 * 
 */
class Tablero extends Controlador
{
	protected $modelo = "";
	protected $sesion;
	protected $usuario;
	
	function __construct()
	{
		$this->sesion = new Sesion();
		if ($this->sesion->getLogin()) {
			$this->modelo = $this->modelo("TableroModelo");
			$this->usuario = $this->sesion->getUsuario();
		} else {
			header("location:".RUTA);
		}
	}

	public function caratula()
	{
		$datos = [
			"titulo" => "Admon",
			"subtitulo" => $this->usuario["nombres"]." ".$this->usuario["apellidos"],
			"usuario"=>$this->usuario,
			"data"=>[],
			"errores" =>[],
			"menu" => true
		];
		$this->vista("tableroCaratulaVista",$datos);
	}
	public function logout()
	{
		if(isset($_SESSION['usuario'])){
			$this->sesion->finalizarLogin();
		}
		header('location:'.RUTA);
	}
}



?>