<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>MyShopee - Signup</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width">
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/main.css">
	</head>

	<?php
		include("db\db_signup_user.php");
		session_start();
		
		// Check had been login or not
		if (!isset($_SESSION["username"])) {
			header('Location: login.php');
		}
		
		// Check had been signup or not
		$db_signup_user = new db_signup_user;
		$signup_user = $db_signup_user->get_signup_user($_SESSION["username"]);
		if ($signup_user != null) {
			header('Location: signup_complete.php');
		}
	?>
	
	<body>
		<div class="container">
		  <div class="row" style="margin-top:20px">
			<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
			  <form name="form_signup" id="form_signup" method="post" role="form" enctype="multipart/form-data" autocomplete="off">
				<fieldset>
				  <h2 align="center">Pendaftaran</h2>
				  <hr></hr>
				  <p align="justify">Bergabunglah dalam program Penjual Terpilih Shopee! Isi form di bawah ini & lampirkan foto diri beserta KTP.</p>
				  <hr></hr>
				  <input class="form-control" type="hidden" name="action" id="action" value="signup" />
				  <h3>Langkah 1</h3>
				  <div class="form-group">
					<input name="ktp_number" type="text" id="ktp_number" class="form-control input-lg" placeholder="No. KTP" pattern="[0-9]{16}" required />
				  </div>
				  <hr></hr>
				  <h3>Langkah 2</h3>
				  <p align="justify">Foto diri beserta KTP Anda. Nomor KTP dan wajah Anda harus terlihat jelas dalam foto.</p>
				  <div class="form-group">
					<input name="user_photo" type="file" id="user_photo" class="filestyle" data-icon="false" data-size="lg" data-placeholder="Foto Diri" required />
				  </div>
				  <div class="form-group">
					<input name="ktp_photo" type="file" id="ktp_photo" class="filestyle" data-icon="false" data-size="lg" data-placeholder="Foto KTP" required />
				  </div>
				  <hr></hr>
				  <div class="form-group">
						<input name="confirmation" type="checkbox" class="big-checkbox" id="confirmation" required/>
						Saya setuju dengan Syarat & Ketentuan program Penjual Terpilih Shopee
				  </div>
				  <hr></hr>
				  <div class="form-group">
					 <input type="submit" name="Submit" value="Kirimkan" class="btn btn-lg btn-primary btn-block" style="background-color: #fe5722; border-color: #fe5722;" />
				  </div>
				</fieldset>
			  </form>
			</div>
		  </div>
		</div>
	</body>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
	<script type="text/javascript" src="css/bootstrap-filestyle.min.js"> </script>
	<script type="text/javascript">
	
	// Validation
	var ktp_number = document.getElementById("ktp_number");

	ktp_number.oninvalid = function(event) {
		event.target.setCustomValidity('KTP number must not be empty, numeric with length 16 characters.');
	}
	
	ktp_number.oninput = function(event) {
		event.target.setCustomValidity('');
	}
	
	// On submit ================
	document.getElementById("form_signup").onsubmit = function() {
	   $.ajax({
			type: "POST",
			url: "controller/signup_management.php",
			data: new FormData($('form[name="form_signup"]')[0]),
			cache: false,
			contentType: false,
			processData: false,
			// Custom XMLHttpRequest
			xhr: function() {
				var myXhr = $.ajaxSettings.xhr();
				if (myXhr.upload) {
					// For handling the progress of the upload
					myXhr.upload.addEventListener('progress', function(e) {
						if (e.lengthComputable) {
							$('progress').attr({
								value: e.loaded,
								max: e.total,
							});
						}
					} , false);
				}
				return myXhr;
			},
			success: function(response) {
				if (response == "Success") {
					window.location = "signup_complete.php";
				} else {
					alert(response);
				}
			},
			error: function(response) {
				alert(response);
			}
		});
		
		return false;
	};
	
	</script>
</html>