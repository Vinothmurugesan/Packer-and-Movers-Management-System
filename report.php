<?php
include 'connection.php';
$sql = "SELECT  a.staff_id as staff_id,a.staff_name as staff_name, b.job_id as job_id,b.job_name as job_name,b.job_status as job_status,c.date as date FROM staffs a, jobs b,assigned_jobs c where a.staff_id=c.staff_id and b.job_id=c.job_id";
$result = mysqli_query($conn, $sql);
$resultarray=array();
        $i=0;
        while($row = mysqli_fetch_array($result))
           {
            $resultarray[$i]["staff_id"]= $row['staff_id'] ;
               $resultarray[$i]["job_id"]= $row['job_id'] ;
               $resultarray[$i]["staff_name"]= $row['staff_name'] ;
               $resultarray[$i]["job_name"]= $row['job_name'] ;
               $resultarray[$i]["date"]=  $row['date'] ;
               $resultarray[$i]['job_status']=$row['job_status'];
               $i++;
            }  
if (isset($_POST['submit'])) {
    $job_status=$_POST['job_status'];
    $sql = "SELECT  a.staff_id as staff_id,a.staff_name as staff_name, b.job_id as job_id,b.job_name as job_name,b.job_status as job_status,c.date as date FROM staffs a, jobs b,assigned_jobs c where a.staff_id=c.staff_id and b.job_id=c.job_id and b.job_status='$job_status' and c.date='2022-06-21'";
    $result = mysqli_query($conn, $sql);
    $resultarray=array();
    $i=0;
    while ($row = mysqli_fetch_array($result)) {
        $resultarray[$i]["staff_id"]= $row['staff_id'] ;
        $resultarray[$i]["job_id"]= $row['job_id'] ;
        $resultarray[$i]["staff_name"]= $row['staff_name'] ;
        $resultarray[$i]["job_name"]= $row['job_name'] ;
        $resultarray[$i]["date"]=  $row['date'] ;
        $resultarray[$i]['job_status']=$row['job_status'];
        $i++;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css">
	<title>Job Reports</title>
</head>
<body>
	<div class="container">
        <div class="card">
        <div class="card-header">
           <h3 style="font-size: 2rem; font-weight: 800; color:black;"> Job Reports</h3>
        </div>
        <div class="row">
          <form class="form-inline" method="post" action="report.php">
            <div class="form-group mb-2">
                <label for="staticEmail2" class="sr-only">From</label>
                <input type="text" class="form-control"  name="startdate" placeholder="Start date">
            </div>
            <div class="form-group mx-sm-3 mb-2">
                <label for="inputPassword2" class="sr-only">To</label>
                <input type="text" class="form-control"  placeholder="End date">
            </div>
            <div class="form-group mx-sm-3 mb-2">
                <label for="inputPassword2" class="sr-only">Job status</label>
                <select class="form-control"  name="job_status">
                    <option value="assigned">Assigned</option>
                    <option value="notassigned">Not Assigned</option>
                    <option value="completed">Completed</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary mb-2">submit</button>
            </form>
        </div>
        <div class="card-body">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Name</th> 
      <th scope="col">Job Name</th>
      <th scope="col">Date</th>
      <th scope="col">Job Status</th>
    </tr>
  </thead>
  <tbody>
        <?php 
         if(!empty($resultarray)) { 
            for($i=0;$i<count($resultarray);$i++) {
                echo "<tr>";
                echo "<td>".$resultarray[$i]['staff_name']."</td>";
                echo "<td>".$resultarray[$i]['job_name']."</td>";
                echo "<td>".$resultarray[$i]['date']."</td>";
                echo "<td>".$resultarray[$i]['job_status']."</td>";
                echo "</tr>";
            }
        }
        else
        {
            echo "<tr>";
            echo "<td>No data found</td>";
            echo "</tr>";
        }
        ?>
  </tbody>
    </table>
    </div>
    </div>
    </div>
        </body>
        </html>
    