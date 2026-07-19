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
        public function cambiarclave($cadena=''){
            Helper::mostrar(Helper::desencriptar($cadena));
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
                            $this->mensaje(
                                "Cambio de clave de acceso",
                                "Cambio de clave de acceso",
                                "Se ha enviado un correo a <b>".$data["correo"]."</b> para que puedas cambiar tu clave de acceso. Cualquier duda te puedes comunicar con nosotros. No olvides revisar tu bandaja de spam.",
                                "login",
                                "success"
                            );
                        }else{
                            array_push($errores,"Error al enviar su correo, inténtelo más tarde.");
                        }
                    }else{
                        array_push($errores,"Haga el favor de verificar su correo");
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