<?php 
session_start();
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	
	require_once 'conn.php';
		$msg = "";
		
	
	if(isset($_POST['submit'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$fullname = $_POST['fullname'];
		$email = $_POST['email'];
        $cpassword = $_POST['cpassword'];

		if($password == $cpassword){
			$sql = "SELECT username, email FROM user WHERE username='$username' AND email='$email'";
			$result = mysqli_query($conn, $sql);
			if(mysqli_num_rows($result)>0){
				$msg = "<div class='alert alert-danger'>Username or Email is already exists</div>";
			}else{
				mysqli_query($conn, "INSERT INTO `user` VALUES('', '$username', '$password', '$fullname',  '$email', '')") or die(mysqli_error());

			
		$link = "localhost/User-Auth Email/verified.php?email=".$email."";
		$message = "Hello $fullname ! <br>"
        . "Please click the link below to confirm your email and complete the registration process.<br>"
        . "You will be automatically redirected to a welcome page where you can then sign in.<br><br>"            
        . "Please click below to activate your account:<br>"
        . "<a href='$link'>Click Here!</a>";
		
		//Load composer's autoloader
		require 'vendor/autoload.php';
 
		$mail = new PHPMailer(true);                            
   
		try {
			//Server settings
			$mail->isSMTP();                                     
			$mail->Host = 'smtp.gmail.com';                      
			$mail->SMTPAuth = true;                             
			$mail->Username = 'cajiibxaaji02@gmail.com';     
			$mail->Password = 'aitfana876';             
			$mail->SMTPOptions = array(
				'ssl' => array(
				'verify_peer' => false,
				'verify_peer_name' => false,
				'allow_self_signed' => true
				)
			);                         
			$mail->SMTPSecure = 'ssl';                           
			$mail->Port = 465;                                   
	
			//Send Email
			$mail->setFrom('cajiibxaaji02@gmail.com');
	
			//Recipients
			$mail->addAddress($email);              
			$mail->addReplyTo('cajiibxaaji02@gmail.com');
	
			//Content
			$mail->isHTML(true);                                  
			$mail->Subject = "Account registration confirmation";
			$mail->Body    = $message;
	
			$mail->send();
	
			header("location:verification.php?fullname=".$fullname."&email=".$email."");
			
		} catch (Exception $e) {
			$_SESSION['result'] = 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
			$_SESSION['status'] = 'error';
		}
	}
		
	}else{
		$msg = "<div class='alert alert-danger'>Password is not matched</div>";

	}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <header>
        <div class="container navigation">
            <nav>
                <div class="logo">
                    <a href="../index.php">Medice</a>
                </div>
                <div class="navbar">
                    <a href="#">About Us</a>
                    <a href="#">Contact Us</a>
                </div>
            </nav>
            <div class="auth">
                <a href="./index.php">Login</a>
                <a href="#">Registration</a>
            </div>
        </div>
    </header>

    <div class="container">
       <form action="" method="post" class="form-group bg-light shadow-lg rounded-lg p-5 my-5">
           <div class="title">
               <h2>Sign Up</h2>
           </div>
          <span> <?php echo $msg;?> </span>
           <div class="input-groups mt-3">
               <label for="">Full Name</label>
               <input type="text" class="form-control my-2 p-2" autocomplete="off" name="fullname" >
           </div>
           <div class="input-groups mt-3">
               <label for="">Username</label>
               <input type="text" class="form-control my-2 p-2" autocomplete="off" name="username"
               value="" required>
           </div>
           <div class="input-groups mt-3">
               <label for="">Email</label>
               <input type="email" class="form-control my-2 p-2" name="email"  required>
           </div>
           <div class="input-groups mt-3">
               <label for="">Password</label>
               <input type="password" class="form-control my-2 p-2" name="password" autocomplete="off" >
            </div>
            <div class="input-groups mt-3">
                <label for="">Confirm Password</label>
                <input type="password" class="form-control my-2 p-2" name="cpassword" autocomplete="off"  >
            </div>
          
         
          
           <button class="btn btn-primary my-2" name="submit">Submit</button>
       </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>