<?php
$servername ="localhost";
$username = "root";
$password = "";
$dbname = "chat";

//Create connection

$conn = new mysqli($servername, $username, $password, $dbname);

//check connection

if($conn -> connect_error)
  {
  
  die("connection faild: " . $conn->connect_error);
 
  
  }
  
 
  ?>
