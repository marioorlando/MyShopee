<?php
	class db_util {
		var $conn;
	
		function get_connection() {	
			// Please change according to the relevant server
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "myshopee";

			// Create connection
			$this->conn = new mysqli($servername, $username, $password, $dbname);

			// Check connection
			if ($this->conn->connect_error) {
				die("Connection failed: " . $this->conn->connect_error);
			}
			
			return $this->conn;
		}
	}
?>