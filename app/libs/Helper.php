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
        public static function correo(string $correo=''){
            return filter_var($correo, FILTER_VALIDATE_EMAIL);
        }
        public static function encriptar(string $cadena=''):string
	{
		$metodo = 'aes-256-cbc';
		$ivLength = openssl_cipher_iv_length($metodo);
		$iv = openssl_random_pseudo_bytes($ivLength); // IV aleatorio seguro
		$salida = openssl_encrypt($cadena, $metodo, LLAVE, 0, $iv);
		$salida = base64_encode($iv . $salida);
		return str_replace(['+', '/', '='], ['-', '_', ''], $salida);
	}

	public static function desencriptar(string $cadena=''):string
	{
		$metodo = 'aes-256-cbc';
		$ivLength = openssl_cipher_iv_length($metodo);
		$cadena = str_replace(['-', '_'], ['+', '/'], $cadena);
		$data = base64_decode($cadena);
		// Extraer el IV del inicio
		$ivDecrypted = substr($data, 0, $ivLength);
		$salida = substr($data, $ivLength);
		//
		return openssl_decrypt($salida, $metodo, LLAVE, 0, $ivDecrypted);
	}
    }
?>