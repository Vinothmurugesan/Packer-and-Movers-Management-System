<?php 

include 'connection.php';

$staff_details = "SELECT * FROM staffs where `status`=1";
$staff_result = mysqli_query($conn, $staff_details);
$stafflist="";
        while($row = mysqli_fetch_array($staff_result))
           {
             $stafflist.="<option value='".$row['staff_id']."'>".$row['staff_name']."</option>";
            }    
       

$job_details= "SELECT * FROM jobs where `job_status`='notassigned'";
$job_results= mysqli_query($conn,$job_details);
$joblist="";
while($row=mysqli_fetch_array($job_results))
{
    $joblist .="<option value='".$row['job_id']."'>".$row['job_name']."</option>";
}


if (isset($_POST['submit'])) 
{
	
	$staff_id = $_POST['staff_id'];
    $job_id=$_POST['job_id'];
	$date = $_POST['date'];
   //echo "Staff ID: ".$staff_id." Job ID: ".$job_id;
	/*$sql = "SELECT * FROM assigned_jobs WHERE date ='$date'";
	$result = mysqli_query($conn, $sql);
	if ( !$result->num_rows > 0){*/
		$sql = "INSERT INTO assigned_jobs (staff_id,job_id,`date`)
				VALUES ('$staff_id','$job_id','$date')";
		$result = mysqli_query($conn, $sql);
		if (!$result) {
			//echo "<script>alert('Wow! The job is assigned for the Staff.')</script>";
			$staff_id = "";
			$job_id = "";
			$date ="";
			
		
		} else {
			echo "<script>alert('Wow! The job is assigned Successfully.')</script>";
		}


		
	
}
mysqli_close($conn);

?>

<!DOCTYPE html>
<html>
<head>
	<<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Assign Jobs</title>
</head>
<body>
	<div class="container">
		<form action="assignjobs.php" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Assign Jobs</p>
			<div class="input-group">
            <label for="usr">Staff:</label>
				<input type="form-select" placeholder="staff_id" name="staff_id" required>
			</div>
            <div class="input-group">
            <label for="usr">Job:</label>
				<input type="form-select" placeholder="job_id" name="job_id" required>
			</div>
			<div class="input-group">
            <label for="usr">Date:</label>
				<input type="text" placeholder="Date" name="date" required>
			</div>
			
			
			<div class="input-group">
				<button name="submit" class="btn">Add Details</button>
			</div>
		</form>
	</div>
</body>
</html>