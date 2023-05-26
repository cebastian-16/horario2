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

		public function buscar($id){
			$consultar = "SELECT f.id, f.nombre,f.lider_ficha,f.hora_inicio,f.hora_final,f.id_centro,f.documento,f.lider_ficha,m.nombre_municipio,a.nombre_ambiente,t.trimestre
			FROM ficha as f
			INNER JOIN trimestres as t on t.id_ficha=f.id_trimestre
			INNER JOIN municipio as m on m.id=f.id_municipio
			INNER JOIN ambiente as a  on a.id=f.id_ambiente	 WHERE f.id='$id'";
			$resultado = mysqli_query($this->conn, $consultar);
			return $resultado;
			
		}

		public function buscarficha($id)
    {
        $consultar = "SELECT f.id, f.nombre,f.lider_ficha,f.hora_inicio,f.hora_final,f.id_centro,f.documento,f.lider_ficha,m.nombre_municipio,a.nombre_ambiente,t.trimestre
        FROM ficha as f
        INNER JOIN trimestres as t on t.id_ficha=f.id_trimestre
        INNER JOIN municipio as m on m.id=f.id_municipio
        INNER JOIN ambiente as a  on a.id=f.id_ambiente	 WHERE f.id='$id'";
        $resultadoFicha = mysqli_query($this->conn, $consultar);
        return $resultadoFicha;
    }

		public function eliminar($id){
			$id = $_GET['id'];
			$eliminar = "DELETE FROM `ficha` WHERE  id='$id'";
			$resultado = mysqli_query($this->conn, $eliminar);
			
			if($resultado == true ){
				echo "<script> alert('El formulario se elimino correctamente'); location.href='index.php'; </script>";
			}else{
				echo "<script> alert('El formulario no elimino correctamente :( '); location.href='index.php'; </script>";
			}

			
		}

		public function consultar($id, $nombre, $hora_inicio, $hora_final, $id_centro, $documento, $lider_ficha, $id_trimestre, $id_municipio, $id_ambiente)
    {
        $sql = "SELECT `id`, `nombre`, `hora_inicio`, `hora_final`, `id_centro`, `documento`, `lider_ficha`, `id_trimestre`, `id_municipio`, `id_ambiente`";

        $resultadoBuscar = mysqli_query($this->conn, $sql);
        if ($resultadoBuscar == TRUE) {

            echo "<div class='alert alert-success alert-dismissible'>";
            echo "  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
            echo "  <strong>Excelente!</strong> Se encontro.";
            echo "</div>";
        } else {
            echo "<div class='alert alert-danger alert-dismissible'>";
            echo "  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
            echo "  <strong>Error!</strong> " . mysqli_error($this->conn) . $sql;
            echo "</div>";
        }
    }
	}
 ?>