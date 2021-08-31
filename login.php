<?php
	session_start();
	require_once 'conn.php';
	
	if(ISSET($_POST['login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		$query = mysqli_query($conn, 
		"SELECT * FROM `user` WHERE `username` = '$username' && `password` = '$password' && `status` = 'Verified'") 
		or die(mysqli_error());
		$count = mysqli_num_rows($query);
		
		if($count > 0){
			header("location: home.php");
		}else{
			$_SESSION['message'] = "Invalid username or password";
			header("location: index.php");
		}
	}
?>