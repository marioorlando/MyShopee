<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>MyShopee - Login</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width">
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/main.css">
	</head>

	<body>
		<div class="container">
		  <div class="row" style="margin-top:20px">
			<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
			  <form name="form_login" id="form_login" method="post" role="form" autocomplete="off">
				<fieldset>
				  <h2 align="center">MyShopee</h2>
				  <hr></hr>
				  <input class="form-control" type="hidden" name="action" id="action" value="login" />
				  <div class="form-group">
					<input name="username" type="text" id="username" class="form-control input-lg" placeholder="Username" pattern="[a-zA-Z0-9]{6,15}" required />
				  </div>
				  <div class="form-group">
					<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" pattern=".{8,16}" required />
				  </div>
				  <div class="form-group">
						<input type="submit" name="Submit" value="Login" class="btn btn-lg btn-primary btn-block" style="background-color: #fe5722; border-color: #fe5722;">
				  </div>
				  <div class="form-group">
						<a href="" class="btn btn-lg btn-primary btn-block" style="background-color: #fe5722; border-color: #fe5722;">Gabung Sekarang</a>
				  </div>
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
	<script type="text/javascript">
	
	// Validation
	var username = document.getElementById("username");
	var password = document.getElementById("password");

	username.oninvalid = function(event) {
		event.target.setCustomValidity('Username must not be empty, alphanumeric with length 6-15 characters.');
	}
	
	username.oninput = function(event) {
		event.target.setCustomValidity('');
	}
	
	password.oninvalid = function(event) {
		event.target.setCustomValidity('Password must not be empty, with length 8-16 characters.');
	}
	
	password.oninput = function(event) {
		event.target.setCustomValidity('');
	}
	
	// On submit
	document.getElementById("form_login").onsubmit = function() {
	   var serializedData = $('form[name="form_login"]').serialize();
		   
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