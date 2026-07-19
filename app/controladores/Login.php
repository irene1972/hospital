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
            $data=[];
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $correo=$_POST['usuario']??"";
                if(empty($correo)){
                    array_push($errores,"El correo electrónico es requerido.");
                }
                if(Helper::correo($correo)==false){
                    array_push($errores,"El correo electrónico no está bien escrito.");
                }
                if(empty($errores)){
                    $data=$this->modelo->buscarCorreo($correo);
                    if(!empty($data)){
                        if($this->enviarCorreo($data)){
                            Helper::mostrar("Si existe en la base de datos");
                        }else{
                            Helper::mostrar("Error no existe en la base de datos");
                        }
                    }else{
                        Helper::mostrar("No existe en la base de datos");
                    }
                        
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