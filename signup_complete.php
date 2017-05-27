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
		//header( "refresh:5;url=http://shopee.co.id" );
	?>
	
	<body>
		<div class="container">
		  <div class="row" style="margin-top:20px">
			<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
				  <h2 align="center">MyShopee</h2>
				  <hr></hr>
				  <h4 align="center">Thank you for signup, redirecting to Shopee website in <label id="count">5</label> seconds</h4>
			</div>
		  </div>
		</div>
	</body>
	
	<script>
		var counter = 5;
		setInterval (function() {   
			counter--;
			if(counter < 1) {
				window.location = 'http://shopee.co.id';
			} else {
				document.getElementById("count").innerHTML = counter;
		    }
		}, 1000);
	</script>
</html>