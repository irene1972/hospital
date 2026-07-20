<?php
define("RUTA","/hospital/");
define("LLAVE","SuperIrene");
//
//Tipos de usuario
//
define("ADMON", 1);
define("RECEPCIONISTA", 2);
define("OPERADOR", 3);
//
//Estados de usuario
//
define("ACTIVO", 1);
define("INACTIVO", 2);
define("SUSPENDIDO", 3);
define("VACACIONES", 4);
//
//Géneros
//
define("MASCULINO", 1);
define("FEMENINO", 2);
//
require_once("libs/Helper.php");
require_once("libs/MySQLdb.php");
require_once("libs/Sesion.php");
require_once("libs/Control.php");
require_once("libs/Controlador.php");
$control=new Control();
?>