<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
	</head>
<body>
<nav class="navbar navbar-default">
	</nav>
	<div class="col-md-3 mt-5"></div>
	<div class="col-md-6 well">
		<h3 class="text-primary">You're ready to go!</h3>
		<hr style="border-top:1px dotted #ccc;"/>
		<div class="col-md-3"></div>
		<div class="col-md-6 mt-5">	
			<?php
				if(ISSET($_REQUEST['fullname']) && ISSET($_REQUEST['email'])){
			?>
				<h3><strong></strong></h3>
				<br />
				<h5>Hi, <?php echo $_REQUEST['fullname']?><h5>
				<h5>We've finished setting up your account.<h5>
				<h5>We sent you a confirmation to your email account<h5>
				<a class="btn btn-primary" href="https://<?php echo $_REQUEST['email']?>" target="_blank">Confirm Email</a>
			<?php
				}
			?>
		</div>
	</div>
</body>
</html>