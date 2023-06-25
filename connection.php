<?php
$host="localhost";
$username="root";
$password="";
$database="axelitintern";
$conn = mysqli_connect($host,$username,$password,$database);

// Check connection
if (!$conn) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error() ;
  die();
}
?>