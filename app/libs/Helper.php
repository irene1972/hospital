<?php
    class Helper{
        public static function mostrar($data,$detener=false){
            print "<pre>";
            var_dump($data);
            print "</pre>";
            if($detener==false){
                exit;
            }
        }
    }
?>