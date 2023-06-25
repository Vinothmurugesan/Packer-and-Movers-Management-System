<?php 

include 'staff_config.php';

error_reporting(0);

session_start();



if (isset($_POST['submit'])) {
	$staff_id = $_POST['staff_id'];
	$staff_name = $_POST['staff_name'];
	$email = $_POST['email'];
	$mobileno = $_POST['mobileno'];

	$sql = "SELECT * FROM staffs WHERE email='$email'";
	$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {

			$sql = "INSERT INTO staffs (staff_id, staff_name, email, mobileno)
					VALUES ('$staff_id','$staff_name','$email','$mobileno')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('Wow! User Registration Completed.')</script>";
				$staff_id = "";
				$staff_name = "";
				$email = "";
				$mobileno = "";
			} else {
				
				echo "<script>alert('Woops! Something Wrong Went.')</script>";
			}
		} else {
			echo "<script>alert('Woops! Email Already Exists.')</script>";
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

	<title>Staff Details</title>
</head>
<body>
	<div class="container">
		<form action="staff_index.php" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Staff Details</p>
			<div class="input-group">
				<input type="id" placeholder="staff id" name="staff_id" value="<?php echo $staff_id; ?>" required>
			</div>
			<div class="input-group">
				<input type="text" placeholder="staff name" name="staff_name" value="<?php echo $staff_name; ?>" required>
			</div>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="int" placeholder="mobile no" name="mobileno" value="<?php echo $mobileno; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Add Details</button>
			</div>
		</form>
	</div>
</body>
</html>