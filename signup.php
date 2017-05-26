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

	<body>
		<div class="container">
		  <div class="row" style="margin-top:20px">
			<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
			  <form name="form_register" id="form_register" method="post" role="form" autocomplete="off">
				<fieldset>
				  <h2 align="center">MyShopee - Signup</h2>
				  <hr></hr>
				  <input class="form-control" type="hidden" name="action" id="action" value="registration" />
				  <div class="form-group">
					<input name="ktp_number" type="text" id="ktp_number" class="form-control input-lg" placeholder="KTP Number" pattern="[0-9]{16}" required />
				  </div>
				  <div class="form-group">
					<input name="user_photo" type="file" id="user_photo" class="filestyle" data-icon="false" data-size="lg" data-placeholder="User Photo">
				  </div>
				  <div class="form-group">
					<input name="ktp_photo" type="file" id="ktp_photo" class="filestyle" data-icon="false" data-size="lg" data-placeholder="KTP Photo">
				  </div>
				  <div class="form-group">
					 <input type="submit" name="Submit" value="Signup" class="btn btn-lg btn-primary btn-block" style="background-color: #fe5722; border-color: #fe5722;" />
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
	document.getElementById("form_register").onsubmit = function() {
	   var serializedData = $('form[name="form_register"]').serialize();
		   
	   $.ajax({
			type: "POST",
			url: "controller/user_management.php",
			data: serializedData,
			success: function(response) {
				if (response == "Success") {
					window.location = "signup.php";
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