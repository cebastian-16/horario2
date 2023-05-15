<?php 
	class horario{
		public $conn;

		public function __construct(){
		require_once '../modelo/conexion.php';
		$conectar = new conectar();
		$this->conn = $conectar->conexion();
		}

		public function mirarHorario($id_ficha)
		{
			$consultahorario = "SELECT * FROM `horario` WHERE id_ficha = '$id_ficha'";
			$resultadohorario = mysqli_query($this->conn, $consultahorario);
			return $resultadohorario;
		} 
	

		public function consultarHorario($id){
			$consultarHorario = "SELECT f.id,  h.lunes, h.martes, h.miercoles, h.jueves, h.viernes, h.sabado, h.domingo
            FROM ficha as f
            INNER JOIN horario as h on h.id_ficha=f.id 
            INNER JOIN centros as c on c.nombre=f.id_centro WHERE f.id='$id'";
			$resultadoHorario = mysqli_query($this->conn, $consultarHorario);
			return $resultadoHorario;
			
		}

		public function insertHorario($id_ficha,$activo,$lunes,$martes,$miercoles,$jueves,$viernes,$sabado,$domingo){
			$insertHorario = "INSERT INTO `horario`(`id_ficha`, `lunes`, `martes`, `miercoles`, `jueves`, `viernes`, `sabado`, `domingo`) VALUES ('$activo','$lunes','$martes','$miercoles','$jueves','$viernes','$sabado','$domingo')";
			$resultadoHorario = mysqli_query($this->conn, $insertHorario);

			// $UltimoDato = "SELECT * FROM horario order by id_ficha desc limit 1";
			// $ultimo = mysqli_fetch_array(mysqli_query($this->conn, $UltimoDato));
			// $Dato = $ultimo['id_ficha']; //Ultimo Dato de caracteristicas ingresado

			// 	//Update de Articulo
			// $sql = "UPDATE `horario` SET id_ficha = '$Dato' WHERE `horario`.`id_ficha` = '$activo'";
			// $resultadoU = mysqli_query($this->conn, $sql);

			if ($resultadoHorario == TRUE) {
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

		public function updateHorario($id_ficha, $lunes, $martes, $miercoles, $jueves, $viernes, $sabado, $domingo){
			$updatehorario = "UPDATE `horario` SET `lunes`='$lunes',`martes`='$martes',`miercoles`='$miercoles',`jueves`='$jueves',`viernes`='$viernes',`sabado`=' $sabado',`domingo`='$domingo' WHERE id_ficha='$id_ficha'";
			$resultadoHorario = mysqli_query($this->conn, $updatehorario);
		
			if ($resultadoHorario == true) {
				echo "<div class='alert alert-success alert-dismissible'>";
				echo "  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
				echo "  <strong>Excelente!</strong> Se ingresó información del computador correctamente.";
				echo "</div>";
			} else {
				echo "<div class='alert alert-danger alert-dismissible'>";
				echo "  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
				echo "  <strong>Error!</strong> " . mysqli_error($this->conn);
				echo "</div>";
			}
		}
	}
		
		
		
		
		
		


	
