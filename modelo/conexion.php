<?php

class conectar
{
	public $servername = 'localhost';
	public $database = "horario";
	public $username = "root";
	public $password = "123456";

	function conexion()
	{	
		$conn = mysqli_connect($this->servername, $this->username, $this->password, $this->database);
		return $conn;
	}

}
