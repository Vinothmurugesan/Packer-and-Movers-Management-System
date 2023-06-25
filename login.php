<?php 

include "connection.php";

if (isset($_POST['username']) && isset($_POST['password'])) {
    $uname = $_POST['username'];
    $pass = $_POST['password'];
    $sql = "SELECT * FROM users WHERE username='$uname' AND password='$pass'";
    $result = mysqli_query($conn, $sql);
    if(!$conn){
        echo "<script type='text/javascript'>alert('Problem in connecting to database');</script>";
       
    }else{
        $row = mysqli_fetch_assoc($result);
        if (!empty($row)) {
            session_start(); 
            $_SESSION['user'] = $uname;
            header("Location:frontpage.php");
        } else {
            echo "<script type='text/javascript'>alert('Invalid Username and Password');</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Login Form</title>
</head>
<body>
	<div class="container">
		<form action="login.php" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
            <div class="alert alert-danger" role="alert" style="display:none;">
                Invalid Username or Password!
            </div>
			<div class="input-group">
				<input type="text" placeholder="Username" name="username" required>
			</div>
			
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" required>
            </div>
           
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>
		</form>
	</div>
</body>
</html>