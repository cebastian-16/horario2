<?php 

	class index{
		public $conn;
		

		public function __construct(){
		require_once '../modelo/conexion.php';
		$conectar = new conectar();
		$this->conn = $conectar->conexion();
		}

		public function consulta($trimestre){
			$consultar = "SELECT f.id, f.nombre,f.lider_ficha,f.hora_inicio,f.hora_final,f.id_centro,f.documento,f.lider_ficha,m.nombre_municipio,a.nombre_ambiente,t.trimestre
			FROM ficha as f
			INNER JOIN trimestres as t on t.id_ficha=f.id_trimestre
			INNER JOIN municipio as m on m.id=f.id_municipio
			INNER JOIN ambiente as a  on a.id=f.id_ambiente	 WHERE t.trimestre='$trimestre'";
			$resultado = mysqli_query($this->conn, $consultar);
			return $resultado;
			
		}

	}
 ?>