<?php
include('connection.php');
session_start();
$from_id=$_SESSION['user_id'];

$from_details="SELECT * FROM user where user_id='$from_id'";
$from_users=mysqli_query($conn, $from_details) or die("failed to query database".mysql_error());
$from_user=mysqli_fetch_array($from_users);

$update_query="UPDATE user SET `user_id`='$from_user[0]', `user_name`='$from_user[1]', `user_mail`='$from_user[2]',
`user_passwd`='$from_user[3]',`status`='offline', `user_image`='$from_user[5]'  WHERE `user_id`=$from_id";
$update_value=mysqli_query($conn,$update_query);

session_unset();
session_destroy();


header("location: index.php");




?>
