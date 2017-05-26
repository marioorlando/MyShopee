<?php
	include(__DIR__ ."/../db/db_signup_user.php");

	$db_signup_user = new db_signup_user;
	
	if($_POST['action'] == "signup")
	{
		// Server validation
	   if ((isset($_POST["username"]) && isset($_POST["password"]))
			&& (strlen($_POST["username"]) >= 6 && strlen($_POST["username"]) <= 15)
			&& (strlen($_POST["password"]) >= 8 && strlen($_POST["password"]) <= 16))
	   {
			$user = $db_user->get_user($_POST["username"], $_POST["password"]);
			if ($user != null) {
				echo "Success";
			} else {
				echo "Username / password salah.";
			}
	   } else {
		   echo "Pemrosesan gagal, silahkan coba beberapa saat lagi.";
	   }
	}
?>