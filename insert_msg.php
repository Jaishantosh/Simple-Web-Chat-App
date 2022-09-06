<?php
session_start();
include("connection.php");

date_default_timezone_set('Asia/Kolkata');
$date = date('d-m-y h:i');


$from_id=$_SESSION['user_id'];

$to_id=$_POST['receive_id'];

$message=$_POST["message"];
$sql="INSERT INTO message (user_id, send_id, receive_id, message, message_time) VALUES('$from_id', '$from_id', '$to_id', '$message', '$date')";
echo $sql;
$query=mysqli_query($conn,$sql);


   header("location: logindp.php?g=$to_id");
?>
