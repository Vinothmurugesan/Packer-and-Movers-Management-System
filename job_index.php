<?php 

include 'job_config.php';

error_reporting(0);

session_start();



if (isset($_POST['submit'])) {
	$job_id = $_POST['job_id'];
	$job_name = $_POST['job_name'];
	$from_address = $_POST['from_address'];
	$to_address = $_POST['to_address'];

	$sql = "SELECT * FROM jobs WHERE from_address='$from_address'";
	$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {

			$sql = "INSERT INTO jobs (job_id, job_name, from_address, to_address)
					VALUES ('$job_id','$job_name','$from_address','$to_address')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('Wow! User Registration Completed.')</script>";
				$job_id = "";
				$job_name = "";
				$from_address = "";
				$to_address = "";
			} else {
				
				echo "<script>alert('Woops! Something Wrong Went.')</script>";
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

	<title>Job Details</title>
</head>
<body>
	<div class="container">
		<form action="job_index.php" method="POST" class="login-from_address">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;"> Job Details</p>
			<div class="input-group">
				<input type="id" placeholder="job id" name="job_id" value="<?php echo $job_id; ?>" required>
			</div>
			<div class="input-group">
				<input type="text" placeholder="job name" name="job_name" value="<?php echo $job_name; ?>" required>
			</div>
			<div class="input-group">
				<input type="text" placeholder="from address" name="from_address" value="<?php echo $from_address; ?>" required>
			</div>
			<div class="input-group">
				<input type="text" placeholder="to address" name="to_address" value="<?php echo $to_address; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Add Details</button>
			</div>
		</form>
	</div>
</body>
</html>