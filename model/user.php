<?php 
	class user {
		var $username;
		var $email;
		var $password;
		
		function __construct($username, $email, $password) {		
			$this->username = $username;
			$this->email = $email;
			$this->password = $password;
		}
		
		// Setter
		function set_username($new_username) {
			$this->username = $new_username;
		}
		function set_email($new_email) {
			$this->email = $new_email;
		}
		function set_password($new_password) {
			$this->password = $new_password;
		}
		
		// Getter
		function get_username() {
			return $this->username;
		}
		function get_email() {
			return $this->email;
		}
		function get_password() {
			return $this->password;
		}
	}
?>