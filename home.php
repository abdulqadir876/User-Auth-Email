<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">	
	</head>
<body>
	<nav class="navbar  bg-primary text-white">
		<div class="container d-flex justify-content-between">
			<a class="navbar-brand" >Logo</a>
			<div class="user d-flex align-items-center">
				<h5 class="mr-3 text-capitalize"><?php echo $_SESSION['username'] ?></h5>
				<a href="./logout.php" class="btn btn-light">Logout</a>
			</div>
		</div>
	</nav>
	<div class="container text-center my-5">
		<div class="alert alert-success alert-dismissible fade show text-capitalize" role="alert">
			  Welcome! <strong> <?php echo $_SESSION['username']?></strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
</body>
</html>