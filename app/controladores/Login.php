<?php 
    class Login extends Controlador{
        function __construct(){
            $this->modelo=$this->modelo("LoginModelo");
        }
        public function caratula(){
            $datos=[
                "titulo"=>"Entrada",
                "subtitulo"=>"Hospital"
            ];
            $this->vista("loginCaratulaVista",$datos);
        }
        public function olvido(){
            $errores=[];
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $correo=$_POST['usuario']??"";
                if(empty($correo)){
                    array_push($errores,"El correo electrónico es requerido.");
                }
                if(Helper::correo($correo)==false){
                    array_push($errores,"El correo electrónico no está bien escrito.");
                }
                if(empty($errores)){
                    Helper::mostrar($correo);
                    /*
                    $data=$this->modelo->buscarCorreo($correo);
                    if(empty($data)){
                        Helper::mostrar("No existe el correo");
                    }else{
                        Helper::mostrar($correo);
                    }
                        */
                }else{
                    Helper::mostrar($errores);
                }
            }
            $datos=[
                "titulo"=>"Olvido clave de acceso",
                "subtitulo"=>"Olvido clave de acceso",
                "errores"=>$errores
            ];
            $this->vista("loginOlvidoVista",$datos);
        }
    }
?>