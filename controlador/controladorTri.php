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
		public function insertTrimestre($trimestre,$activo){
			$insertTrimestre = "INSERT INTO `trimestres` (id_ficha,`trimestre`) VALUES ('$activo','$trimestre')"; 
			$resultadoTrimestre = mysqli_query($this->conn, $insertTrimestre);
	

			$UltimoDato = "SELECT * FROM trimestres order by id_ficha desc limit 1";
			$ultimo = mysqli_fetch_array(mysqli_query($this->conn, $UltimoDato));
			$Dato = $ultimo['id_ficha']; //Ultimo Dato de caracteristicas ingresado

				//Update de Articulo
			$sql = "UPDATE `trimestres` SET `id_ficha`='" . $Dato . "' WHERE `trimestres`.`id_ficha` = '" . $activo . "'";
			$resultadoU = mysqli_query($this->conn, $sql);

			if ($resultadoTrimestre == TRUE and $resultadoU == TRUE) {
				echo "<div class='alert alert-success alert-dismissible'>";
				echo "  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
				echo "  <strong>Excelente!</strong> Se ingreso informacion del computador correctamente.";
				echo "</div>";

			} else {
				// header('Location: articulo.php');
				echo "<div class='alert alert-danger alert-dismissible'>";
				echo "  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
				echo "  <strong>Error!</strong> " . mysqli_error($this->conn);
				echo "</div>";
			}
			
		 }

	}
 ?>