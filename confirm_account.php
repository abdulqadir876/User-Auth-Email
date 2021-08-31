<?php
	require_once 'conn.php';
	
	if(ISSET($_REQUEST['email'])){
		$email = $_REQUEST['email'];
		
		mysqli_query($conn, "UPDATE `user` SET `status` = 'Verified' WHERE `email` = '$email'") or die(mysqli_error());
		
		header('location:index.php');
	}
?>