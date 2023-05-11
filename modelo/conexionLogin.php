<?php

	class conectarUsuarios{
		public $servername = 'localhost';
		public $database = "horario";
		public $username = "root";
		public $password = "123456";

		function conexionUsuarios(){
			$connUsuarios = mysqli_connect($this->servername, $this->username, $this->password, $this->database);
			return $connUsuarios;
		}
	}
