<?php
	include(__DIR__ ."/../db/db_signup_user.php");

	$db_signup_user = new db_signup_user;
	
	if($_POST['action'] == "signup")
	{
		session_start();
		$target_dir = __DIR__ ."/../images/";
		
		// User photo preparation
		$resource_file_user = basename($_FILES["user_photo"]["name"]);
		$imageFileType_user = pathinfo($resource_file_user,PATHINFO_EXTENSION);
		$target_file_user = $target_dir . $_SESSION["username"] . "-user." . $imageFileType_user;
		
		// KTP photo preparation
		$resource_file_ktp = basename($_FILES["ktp_photo"]["name"]);
		$imageFileType_ktp = pathinfo($resource_file_ktp,PATHINFO_EXTENSION);
		$target_file_ktp = $target_dir . $_SESSION["username"] . "-ktp." . $imageFileType_ktp;
		
		if ((isset($_POST["ktp_number"]) && isset($_FILES["user_photo"]) && isset($_FILES["ktp_photo"]))
			&& (strlen($_POST["ktp_number"]) == 16))
		{
			$result = $db_signup_user->add_signup_user($_SESSION["username"], $_POST["ktp_number"], $_SESSION["username"] . "-user." . $imageFileType_user, $_SESSION["username"] . "-ktp." . $imageFileType_ktp);
			if ($result == "Success") {
				// Upload files
				$uploadOk = 1;
				// Check if image file is a actual image or fake image
				if(isset($_POST["submit"])) {
					$check_user = getimagesize($_FILES["user_photo"]["tmp_name"]);
					$check_ktp = getimagesize($_FILES["ktp_photo"]["tmp_name"]);
					if(($check_user !== false) && ($check_ktp !== false)) {
						echo "File is an image.";
						$uploadOk = 1;
					} else {
						echo "File is not an image.";
						$uploadOk = 0;
					}
				}
				// Allow certain file formats
				if(($imageFileType_user != "jpg" && $imageFileType_user != "png" && $imageFileType_user != "jpeg" && $imageFileType_user != "gif" ) ||
				($imageFileType_ktp != "jpg" && $imageFileType_ktp != "png" && $imageFileType_ktp != "jpeg" && $imageFileType_ktp != "gif" ))
				{
					echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
					$uploadOk = 0;
				}
				// Check if $uploadOk is set to 0 by an error
				if ($uploadOk == 0) {
					echo "Sorry, your file was not uploaded.";
				// If everything is ok, try to upload file
				} else {
					if (move_uploaded_file($_FILES["user_photo"]["tmp_name"], $target_file_user)) {
						if (move_uploaded_file($_FILES["ktp_photo"]["tmp_name"], $target_file_ktp)) {
							echo "Success";
						} else {
							echo "Sorry, there was an error uploading your file.";
						}
					} else {
						echo "Sorry, there was an error uploading your file.";
					}
				}
			} else {
				echo $result;
			} 
		} else {
		   echo "Pemrosesan gagal, silahkan coba beberapa saat lagi.";
		}
	}
?>