<?php
include 'config.php';
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);
$resultarray=array();
        $i=0;
        while($row = mysqli_fetch_array($result))
           {   
               $resultarray[$i]["username"]= $row['username'] ;
               $resultarray[$i]["email"]=  $row['email'] ;
               $resultarray[$i]["phone_number"]=  $row['phone_number'];
               $resultarray[$i]['password']=$row['password'];
               $i++;
            }    
            mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css">

	<title>List of Users</title>
</head>
<body>
	<div class="container">
        <div class="card">
        <div class="card-header">
        <p class="login-text" style="font-size: 2rem; font-weight: 800; color:black;">Registered Users</p>
        </div>
        <div class="card-body">
    <table class="table">
  <thead>
    <tr  style="color:black;">
      <th scope="col">username</th>
      <th scope="col">email</th>
      <th scope="col">phone_number</th>
    </tr>
  </thead>
  <tbody>
        <?php 
        if(!empty($resultarray)) { 

            for($i=0;$i<count($resultarray);$i++) {
                echo "<tr>";
                echo "<td><a href='updateuser.php?id=".$resultarray[$i]['username']."'>".$resultarray[$i]['username']."</td>";
                echo "<td>".$resultarray[$i]['email']."</td>";
                echo "<td>".$resultarray[$i]['phone_number']."</td>";
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
    