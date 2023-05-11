<?php 
	class login{
		public $conn;

		public function __construct(){
			require_once '../modelo/conexionLogin.php';
			$conectar=new conectarUsuarios();
			$this->conn=$conectar->conexionUsuarios();
		}

		public function consultarLogin($usuario, $contraseña){
			$consultaLogin= "SELECT * FROM usuarios WHERE usuario='".$usuario."' and contraseña='".$contraseña."'  ";
            $resultadoLogin = mysqli_query( $this->conn, $consultaLogin );
			$resultadoLogin = $resultadoLogin->fetch_assoc();
			return $resultadoLogin;
		}
		
	}
 ?>