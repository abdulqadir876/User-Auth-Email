<?php 
    session_start();

	require_once 'conn.php';

    $msg = '';
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM user WHERE  username = '$username' && password = '$password' && `status` = 'Verified'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        
        $_SESSION['username'] = $username;
        if($row['username'] == $username)
        {
            header("Location: home.php");
        }
        else
        {
            $msg = '<div class="alert alert-danger">Username or Password incorrect</div>';
        }
    
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
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
                <a href="#">Login</a>
                <a href="register_form.php">Registration</a>
            </div>
        </div>
    </header>

    <div class="container">
       <form action="" method="post" class="form-group bg-light shadow-lg rounded-lg p-5 my-5">
           <div class="title">
               <h2>Sign in</h2>
           </div>
           <?php echo $msg; ?>
           <input type="text" class="form-control my-3" name="username" placeholder="Username or Email" required autoComplete="off">
           <input type="text" class="form-control my-3" name="password" placeholder="Password" required autoComplete="off">
           <div class="reg">
               <a href="./register_form.php" class="my-1">Register here</a>
           </div>
           <button class="btn btn-primary my-3" name="submit">Submit</button>
       </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>