<?php 
	class signup_user {
		var $username;
		var $ktp_number;
		var $user_photo;
		var $ktp_photo;
		
		function __construct($username, $ktp_number, $user_photo, $ktp_photo) {		
			$this->username = $username;
			$this->ktp_number = $ktp_number;
			$this->user_photo = $user_photo;
			$this->ktp_photo = $ktp_photo;
		}
		
		// Setter
		function set_username($new_username) {
			$this->username = $new_username;
		}
		function set_ktp_number($new_ktp_number) {
			$this->ktp_number = $new_ktp_number;
		}
		function set_user_photo($new_user_photo) {
			$this->user_photo = $new_user_photo;
		}
		function set_ktp_photo($new_ktp_photo) {
			$this->ktp_photo = $new_ktp_photo;
		}
		
		// Getter
		function get_username() {
			return $this->username;
		}
		function get_ktp_number() {
			return $this->ktp_number;
		}
		function get_user_photo() {
			return $this->user_photo;
		}
		function get_ktp_photo() {
			return $this->ktp_photo;
		}
	}
?>