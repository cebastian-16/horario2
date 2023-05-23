<?php
class ficha
{
	public $conn;

	public function __construct()
	{
		require_once '../modelo/conexion.php';
		$conectar = new conectar();
		$this->conn = $conectar->conexion();
	}

	public function mirarficha($id)
	{
		$consultarficha = "SELECT * FROM `ficha` WHERE id = '$id'";
		$resultadoficha = mysqli_query($this->conn, $consultarficha);
		return $resultadoficha;
	}

	public function consultarTipo()
	{
		$consultaTipo = "SELECT * FROM centros";
		$resultadoTipo = mysqli_query($this->conn, $consultaTipo);
		return $resultadoTipo;
	}
	public function consultarTipo2()
	{
		$consultaTipo = "SELECT * FROM trimestres";
		$resultadoTipo = mysqli_query($this->conn, $consultaTipo);
		return $resultadoTipo;
	}
	public function consultarTipo3()
	{
		$consultaTipo = "SELECT * FROM municipio";
		$resultadoTipo = mysqli_query($this->conn, $consultaTipo);
		return $resultadoTipo;
	}
	public function consultarTipo4()
	{
		$consultaTipo = "SELECT * FROM ambiente";
		$resultadoTipo = mysqli_query($this->conn, $consultaTipo);
		return $resultadoTipo;
	}



	public function consultarficha($id, $nombre, $hora_inicio, $hora_final, $id_centro, $documento, $lider_ficha, $id_trimestre, $id_municipio, $id_ambiente)
	{	// Verificar si ya existe una ficha con el mismo número de identificación
		$consultaExistencia = "SELECT COUNT(*) as total FROM ficha WHERE id='$id'";
		$resultadoExistencia = mysqli_query($this->conn, $consultaExistencia);

		if ($resultadoExistencia) {
			$filaExistencia = mysqli_fetch_assoc($resultadoExistencia);
			$totalExistencia = $filaExistencia['total'];

			if ($totalExistencia > 0) {
				echo "<div class='alert alert-danger alert-dismissible'>";
				echo "  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
				echo "  <strong>Excelente!</strong> ya existe el numero de ficha:" . $id . " ";
				echo "</div>";
				return; // Detener la ejecución de la función si ya existe una ficha con el mismo número de identificación
			}
		}

		$consultarficha = "INSERT INTO ficha (id, nombre, hora_inicio, hora_final, id_centro, documento, lider_ficha, id_trimestre, id_municipio, id_ambiente) VALUES ('$id', '$nombre', '$hora_inicio', '$hora_final', '$id_centro', '$documento', '$lider_ficha', '$id_trimestre', '$id_municipio', '$id_ambiente')";
		$resultadoficha = mysqli_query($this->conn, $consultarficha);

		if ($resultadoficha == TRUE) {

			echo "<div class='alert alert-success alert-dismissible'>";
			echo "  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
			echo "  <strong>Excelente!</strong> Se ingreso Articulo " . $id . " correctamente.";
			echo "	<a href='insert-horario.php?activo=" . $id . "'><input type='button' class='btn btn-primary' value='insertar horario'></a> ";
			echo "</div>";
		} else {
			echo "<div class='alert alert-danger alert-dismissible'>";
			echo "  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
			echo "  <strong>Error!</strong> " . mysqli_error($this->conn);
			echo "</div>";
		}
	}

	public function actualizarficha($id, $hora_inicio, $hora_final, $documento, $lider_ficha, $id_trimestre)
	{
		$modificarficha = "UPDATE `ficha` SET `hora_inicio`='$hora_inicio',`hora_final`='$hora_final',`documento`='$documento',`lider_ficha`='$lider_ficha', `id_trimestre`='$id_trimestre' WHERE id = '$id'";
		$resultadoficha = mysqli_query($this->conn, $modificarficha);
		if ($resultadoficha == TRUE) {
			echo "<div alert  class='alert alert-primary d-flex align-items-center' role='alert'>";
			echo "  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
			echo "  <strong>Excelente!</strong> Se actualizo la ficha bien " . $id . " correctamente.";
			echo "</div>";
		} else {
			echo "<div  class='alert alert-danger d-flex align-items-center' role='alert'>";
			echo "  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
			echo "  <strong>Error!</strong> " . mysqli_error($this->conn);
			echo "</div>";
		}
	}

	
}
