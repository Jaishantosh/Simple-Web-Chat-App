<?php

include ('connection.php');
if(isset($_GET['m_id']))
{
	$m_id=$_GET['m_id'];
	$to_id=$_GET['to_id'];
	
	$delete="DELETE FROM `message` WHERE `message`.`message_id` = $m_id";
	echo $delete;
	$chats=mysqli_query($conn, $delete) or die("failed to query database".mysql_error());
	
 	header("location: delete.php?g=$to_id");
}

?>


