<?php 

	class index{
		public $conn;
		

		public function __construct(){
		require_once '../modelo/conexion.php';
		$conectar = new conectar();
		$this->conn = $conectar->conexion();
		}

		public function consulta($trimestre){
			$consultar = "SELECT f.id, f.nombre,f.lider_ficha,f.hora_inicio,f.hora_final,f.id_centro,f.documento,f.lider_ficha,t.id_ficha,t.trimestre
			FROM ficha as f
			INNER JOIN trimestres as t on t.id_ficha=f.id_trimestre WHERE t.trimestre='$trimestre'";
			$resultado = mysqli_query($this->conn, $consultar);
			return $resultado;
			
		}

		
		

	}
 ?>