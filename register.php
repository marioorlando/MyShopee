<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>MyShopee - Register</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width">
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/main.css">
	</head>

	<body>
		<div class="container">
		  <div class="row" style="margin-top:20px">
			<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
			  <form name="form_login" method="post" action="login.php" role="form">
				<fieldset>
				  <h2 align="center">Daftar Pengguna Baru</h2>
				  <hr></hr>
				  <div class="form-group">
					<input name="username" type="text" id="username" class="form-control input-lg" placeholder="Username"">
				  </div>
				  <div class="form-group">
					<input name="email" type="text" id="email" class="form-control input-lg" placeholder="Email"">
				  </div>
				  <div class="form-group">
					<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password">
				  </div>
				  <div class="form-group">
					<input type="password_confirmation" name="password_confirmation" id="password_confirmation" class="form-control input-lg" placeholder="Confirm Password">
				  </div>
				  <div class="form-group">
						<input type="submit" name="Submit" value="Daftar" class="btn btn-lg btn-primary btn-block" style="background-color: #fe5722; border-color: #fe5722;">
				  </div>
				  </div>
				</fieldset>
			  </form>
			</div>
		  </div>
		</div>
	</body>
</html>