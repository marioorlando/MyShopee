<?php
	include_once("db_util.php"); 
	include(__DIR__ ."/../model/signup_user.php"); 

	class db_signup_user {
		var $conn;
		
		function __construct() {		
			$db_util = new db_util;
			$this->conn = $db_util->get_connection();	
		}
		
		function get_signup_user($username) {
			$sql = 'SELECT * FROM signup_user WHERE username="'.$username.'"';
			
			$result = $this->conn->query($sql);
			
			if ($result->num_rows != 0) {
				$row = $result->fetch_assoc();
				$signup_user = new signup_user($row["username"], $row["ktp_number"], $row["user_photo"], $row["ktp_photo"]);
			} else {
				$signup_user = null;
			}
			
			return $signup_user;
		}
		
		function add_signup_user($new_username, $new_ktp_number, $new_user_photo, $new_ktp_photo) {
			$sql = 'INSERT INTO signup_user VALUES ("'.$new_username.'", "'.$new_ktp_number.'", "'.$new_user_photo.'", "'.$new_ktp_photo.'")';
			
			if ($this->conn->query($sql) === TRUE) {
				return "Success";
			} else {
				return "Error adding record: " . $this->conn->error;
			}
		}
	}
?>