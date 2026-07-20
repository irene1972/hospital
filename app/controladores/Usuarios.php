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
		if ($_SERVER['REQUEST_METHOD']=="POST") {
	    	$id = $_POST['id'] ?? "";
	    	$tipoUsuario = Helper::cadena($_POST['tipoUsuario'] ?? "");
	    	$nombres = Helper::cadena($_POST['nombres'] ?? "");
			$apellidos = Helper::cadena($_POST['apellidos'] ?? "");
			$telefono = Helper::cadena($_POST['telefono'] ?? "");
			$correo = Helper::cadena($_POST['correo'] ?? "");
			$genero = Helper::cadena($_POST['genero'] ?? "");
			$estadoUsuario = Helper::cadena($_POST['estadoUsuario'] ?? "");
			//
			$pagina = $_POST['pagina'] ?? "1";
			//
			// Validamos la información
			//
			if(empty($nombres)){
				array_push($errores,"El nombre del usuario es requerido.");
			}
			if(empty($apellidos)){
				array_push($errores,"Los apellidos del usuario son requeridos.");
			}
			if(empty($correo)){
				array_push($errores,"El correo del usuario es requerido.");
			}
			if($genero=="void"){
				array_push($errores,"El género es obligatorio.");
			}
			if($tipoUsuario=="void"){
				array_push($errores,"El tipo de usuario es obligatorio.");
			}
			if (Helper::correo($correo)==false) {
				array_push($errores,"El correo no tiene un formato válido.");
			} else if(trim($id)==="" && $this->modelo->getCorreo($correo)==true){
				array_push($errores,"El correo ya existe en la base de datos.");
			}
			// Crear arreglo de datos
			//
			$data = [
				"id" => $id,
				"tipoUsuario"=>$tipoUsuario,
				"nombres"=>$nombres,
				"apellidos"=>$apellidos,
				"telefono"=>$telefono,
				"correo"=>$correo,
				"clave"=>Helper::generarClave(10),
				"genero"=>$genero
			];
			Helper::mostrar($data);
	    }
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
	    $this->vista("usuariosAltaVista",$datos);
	}

	public function caratula()
	{
		$data = $this->modelo->getTabla();
		$errores = [];
		$datos = [
			"titulo" => "Usuarios",
			"subtitulo" => "Usuarios",
			"usuario"=>$this->usuario,
			"activo" => "usuarios",
			"data"=>$data,
			"errores" =>$errores,
			"menu" => true
		];
		$this->vista("usuariosCaratulaVista",$datos);
	}

}
?>