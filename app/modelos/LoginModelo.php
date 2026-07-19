<?php 
    class LoginModelo{
        private $db;
        function __construct(){
            $this->db=new MySQLdb();
        }
        public function buscarCorreo(string $correo=''){
            $sql="SELECT id,nombres,apellidos,correo,clave,telefono,estadoUsuario,tipoUsuario,genero ";
            $sql.="FROM usuarios ";
            $sql.="WHERE correo= '".$correo."'AND baja=0";
            return $this->db->query($sql);
        }
    }
?>