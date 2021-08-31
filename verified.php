<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
		<title>V Or</title>
	</head>
<body>
	<nav class="navbar navbar-default">
	</nav>
	<div class="col-md-3"></div>
	<div class="col-md-6 well">
		<h3 class="text-primary">PHP - Simple Email Verification Using PHPMailer</h3>
		<hr style="border-top:1px dotted #ccc;"/>
		<div class="col-md-2"></div>
		<div class="col-md-8">	
			<?php
				if(ISSET($_REQUEST['email'])){
					$email = $_REQUEST['email'];
			?>
				<center><h4>The email that you provided is already verified.</h4></center>
				
				<h5>Please let me know if you have any questions or would like further information, otherwise, no response is needed.</h5>
				
				<h5>You may now login to your account <a href="confirm_account.php?email=<?php echo $email?>">here</a></h5>
				
				<h5>Thank You!,</h5>
				
			<?php
				
				}
			?>
		</div>
	</div>
</body>
</html>