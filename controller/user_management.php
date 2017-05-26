<?php
	include(__DIR__ ."/../db/db_user.php");

	$db_user = new db_user;
	
	if($_POST['action'] == "registration")
	{
	   // Server validation
	   if ((isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["password"]))
			&& (strlen($_POST["username"]) >= 6 && strlen($_POST["username"]) <= 15)
			&& (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
			&& (strlen($_POST["password"]) >= 8 && strlen($_POST["password"]) <= 16))
	   {
			$user = $db_user->get_user($_POST["username"]);
			if ($user != null) {
				echo "Username " . $_POST["username"] . " telah digunakan.";
			} else {
				$result = $db_user->add_user($_POST["username"], $_POST["email"], $_POST["password"]);
				echo $result;
			}
	   } else {
		   
	   }
	}
?>