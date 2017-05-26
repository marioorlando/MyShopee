<?php
	include_once("db_util.php"); 
	include(__DIR__ ."/../model/signup_user.php"); 

	class db_signup_user {
		var $conn;
		
		function __construct() {		
			$db_util = new db_util;
			$this->conn = $db_util->get_connection();	
		}
		
		function get_user($username, $password) {
			$sql = 'SELECT * FROM user WHERE username="'.$username.'" AND password=MD5("'.$password.'")';
			
			$result = $this->conn->query($sql);
			
			if ($result->num_rows != 0) {
				$row = $result->fetch_assoc();
				$user = new user($row["username"], $row["email"], $row["password"]);
			} else {
				$user = null;
			}
			
			return $user;
		}
		
		function add_signup_user($new_username, $new_ktp_number, $new_user_photo, $new_ktp_photo) {
			$sql = 'INSERT INTO user VALUES ("'.$new_username.'", "'.$new_email.'", MD5("'.$new_password.'"))';
			
			if ($this->conn->query($sql) === TRUE) {
				return "Success";
			} else {
				return "Error adding record: " . $this->conn->error;
			}
		}
	}
?>