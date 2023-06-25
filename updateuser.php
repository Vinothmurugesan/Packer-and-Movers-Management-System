<?php 

include 'config.php';

error_reporting(0);

if (isset($_GET['id']))
{
$username=$_GET['id'];
$sql = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$username=$row['username'];
$email=$row['email'];
$phone_number=$row['phone_number'];
$password=$row['password'];
}



if (isset($_POST['update'])) {
	$email = $_POST['email'];
	$phone_number = $_POST['phone_number'];
	//$password = md5($_POST['password']);
	$username=$_GET['id'];
		
			$sql = "UPDATE users SET email='$email', phone_number='$phone_number' WHERE username='$username'";
			if ($conn->query($sql) === TRUE) {
                echo "Record updated successfully";
              } else {
                echo "Error updating record: " . $conn->error;
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

	<title>Update Details</title>
</head>
<body>
	<div class="container">
		<form action="updateuser.php?id=<?php echo $_GET["id"];?>" method="post" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Update Details</p>
			<div class="input-group">
				<input type="email" placeholder="email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="int" placeholder="phone_number" name="phone_number" value="<?php echo $phone_number; ?>" required>
			</div>
			<!--
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $password; ?>" required>
            </div>
            -->
			<div class="input-group">
				<input type="submit" class="btn" name="update" value="Update">
			</div>
		</form>
	</div>
</body>
</html>