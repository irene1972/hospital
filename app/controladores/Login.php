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
            $datos=[
                "titulo"=>"Olvido clave de acceso",
                "subtitulo"=>"Olvido clave de acceso"
            ];
            $this->vista("loginOlvidoVista",$datos);
        }
    }
?>