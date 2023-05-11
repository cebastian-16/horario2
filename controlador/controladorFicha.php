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

	public function consultarTipo(){
		$consultaTipo = "SELECT * FROM centros";
		$resultadoTipo = mysqli_query( $this->conn, $consultaTipo );
		return $resultadoTipo;
	}
	public function consultarTipo2(){
		$consultaTipo = "SELECT * FROM trimestres";
		$resultadoTipo = mysqli_query( $this->conn, $consultaTipo );
		return $resultadoTipo;
	}



	public function consultarficha($id, $nombre,$hora_inicio,$hora_final,$id_centro, $documento, $lider_ficha,$id_trimestre)
	{
		$consultarficha = "INSERT INTO `ficha` (`id`, `nombre`, `hora_inicio`, `hora_final`, `id_centro`, `documento`, `lider_ficha`, `id_trimestre`)
		VALUES ('$id', '$nombre','$hora_inicio','$hora_final','$id_centro',' $documento', '$lider_ficha','$id_trimestre')";
		$resultadoficha = mysqli_query($this->conn, $consultarficha);
		if ($resultadoficha==TRUE){
	
		echo "<div class='alert alert-success alert-dismissible'>";
		echo "  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
		echo "  <strong>Excelente!</strong> Se ingreso Articulo " . $id . " correctamente.";
		echo "</div>";
	}else{
		echo "<div class='alert alert-danger alert-dismissible'>";
		
		echo "  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
		echo "  <strong>Error!</strong> ".mysqli_error($this->conn);
		echo "</div>";
	  }
	} 

	public function actualizarficha($id, $nombre, $hora_inicio,$hora_final,$id_centro, $documento, $lider_ficha)
	{
		$modificarficha = "UPDATE `ficha` SET `id`='$id',`nombre`='$nombre',`hora_inicio`='$hora_inicio',`hora_final`='$hora_final',`id_centro`='$id_centro',`documento`='$documento',`lider_ficha`='$lider_ficha' WHERE id = '$id'";
		$resultadoficha = mysqli_query($this->conn, $modificarficha);
		if ($resultadoficha==TRUE){
	
		echo "<div class='alert alert-success alert-dismissible'>";
		echo "  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
		echo "  <strong>Excelente!</strong> Se actualizo la ficha bien " . $id . " correctamente.";
		echo "</div>";
	}else{
		echo "<div class='alert alert-danger alert-dismissible'>";
		
		echo "  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
		echo "  <strong>Error!</strong> ".mysqli_error($this->conn);
		echo "</div>";
	  }
	} 
}
