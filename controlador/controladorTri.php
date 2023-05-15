<?php 
	class trimestre{
		public $conn;

		public function __construct(){
		require_once '../modelo/conexion.php';
		$conectar = new conectar();
		$this->conn = $conectar->conexion();
		}

		public function consultar(){
			$consultar = "SELECT * FROM `trimestres`";
			$resultado = mysqli_query($this->conn, $consultar);
			return $resultado;
			
		}

		public function consulta(){
			$consultar = "SELECT * FROM `trimestres` where trimestre ='trimestre2'";
			$resultado = mysqli_query($this->conn, $consultar);
			return $resultado;
			
		}

		public function consultas(){
			$consultar = "SELECT * FROM `trimestres` where trimestre ='trimestre3'";
			$resultado = mysqli_query($this->conn, $consultar);
			return $resultado;
			
		}

		public function consultasT(){
			$consultar = "SELECT * FROM `trimestres` where trimestre ='trimestre4'";
			$resultado = mysqli_query($this->conn, $consultar);
			return $resultado;
			
		}
		

	}
 ?>