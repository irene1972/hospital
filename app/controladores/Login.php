<?php  
/**
 * 
 */
class Login extends Controlador
{
	private $sesion;
	function __construct()
	{
		$this->modelo = $this->modelo("LoginModelo");
	}

	public function caratula()
	{
		$data=[];
		if(isset($_COOKIE['datos'])){
			$datos_array=explode("|",$_COOKIE['datos']);
			$usuario=$datos_array[0];
			$clave=Helper::desencriptar($datos_array[1]);
			$data=[
				"usuario"=>$usuario,
				"clave"=>$clave,
				"recordar"=>true
			];
		}
		$datos = [
			"titulo" => "Entrada",
			"subtitulo" => "Hospital",
			"data"=>$data
		];
		$this->vista("loginCaratulaVista",$datos);
	}

	public function cambiarclave($cadena='')
	{
		$id = Helper::desencriptar($cadena);
		$errores = [];
		if ($_SERVER['REQUEST_METHOD']=="POST") {
			$clave1 = trim($_POST['clave']??"");
			$clave2 = trim($_POST['verifica']??"");
			$id = trim($_POST['id']??"");
			//
			if (empty($clave1)) {
				array_push($errores, "La clave de acceso es requeria.");
			}
			if (empty($clave2)) {
				array_push($errores, "La clave de verificación es requerida.");
			}
			if ($clave1!=$clave2) {
				array_push($errores, "Las claves de acceso no coinciden.");
			} else if(Helper::validarClaveSegura($clave1)==false){
				array_push($errores, "La clave de acceso no es segura.");
			}
			if (empty($errores)) {
				$clave = hash_hmac("sha512", $clave1, LLAVE);
				$data = ["id"=>$id,"clave"=>$clave];
				if ($this->modelo->actualizarClaveAcceso($data)) {
					$this->mensaje(
					"Cambio de clave de acceso",
					"Cambio de clave de acceso",
					"Cambio de la clave de acceso exitosa.",
					"login",
					"success");
				} else {
					$this->mensaje(
					"Cambio de clave de acceso",
					"Cambio de clave de acceso",
					"Error al actualizar la clave de acceso.",
					"login",
					"danger");
				}
			}
		} else if ($id=="") {
			$this->mensaje(
			"Cambio de clave de acceso",
			"Cambio de clave de acceso",
			"Error al desencriptar. Favor de intentarlo más tarde.",
			"login",
			"danger");
		} 
		$datos = [
		"titulo" => "Cambiar contraseña",
		"subtitulo" => "Cambiar contraseña",
		"errores" => $errores,
		"data" => $id
		];
		$this->vista("loginCambiarVista",$datos);
	}

	public function olvido()
	{
		$errores = [];
		$data = [];
		if ($_SERVER['REQUEST_METHOD']=='POST') {
			$correo = $_POST['usuario']??"";
			if (empty($correo)) {
				array_push($errores, "El correo electrónico es requerido.");
			}
			if (Helper::correo($correo)==false) {
				array_push($errores, "El correo electrónico no está bien escrito.");
			}
			if (empty($errores)) {
				$data = $this->modelo->buscarCorreo($correo);
				if (!empty($data)) {
					if ($this->enviarCorreo($data)) {
						$this->mensaje(
							"Cambio de clave de acceso",
							"Cambio de clave de acceso",
							"Se ha enviado un correo a <b>".$data["correo"]."</b> para que puedas cambiar tu clave de acceso. Cualquier duda te puedes comunicar con nosotros. No olvides revisar tu bandeja de spam.",
							"login",
							"success");
					} else {
						array_push($errores, "Error al enviar su correo, inténtelo más tarde.");
					}
				} else {
					array_push($errores, "Favor de verificar su correo electrónico.");
				}						
			} 
		}
		$datos = [
			"titulo" => "Olvido clave de acceso",
			"subtitulo" => "Olvido clave de acceso",
			"errores" => $errores
		];
		$this->vista("loginOlvidoVista",$datos);
	}
	public function verificar(){
		$errores=[];
		if ($_SERVER["REQUEST_METHOD"]=="POST") {
			$usuario=$_POST['usuario']??"";
			$clave=$_POST['clave']??"";
			$recordar=isset($_POST['recordar'])?"on":"off";
			$valor=$usuario."|".Helper::encriptar($clave);
			//
			if($recordar=="on"){
				$fecha=time()+(60*60*24*7);
			}else{
				$fecha=time()-1;
			}
			setcookie("datos",$valor,$fecha,RUTA);
			//
			if (empty($clave)) {
				array_push($errores, "La clave de acceso es requerida.");
			}
			if (empty($usuario)) {
				array_push($errores, "El usuario es requerido.");
			}
			if (count($errores)==0) {
				$clave = hash_hmac("sha512", $clave, LLAVE);
				$data = $this->modelo->buscarCorreo($usuario);
				if ($data && $data["clave"]==$clave) {
					//Helper::mostrar("Bienvenido al sistema de administración de un hospital.");
					unset($data["clave"]);
					$this->sesion=new Sesion();
					$this->sesion->iniciarLogin($data);
					//Helper::mostrar($this->sesion->getUsuario());
					header("location:".RUTA."tablero");
				} 
			}
			$this->mensaje(
			"Sistema de un hospital",
			"Sistema de un hospital",
			"Existió un error al entrar al sistema. Haga el favor de intentarlo nuevamente.",
			"login",
			"danger");
		}
	}
}



?>