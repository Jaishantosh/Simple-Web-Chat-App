<?php
include ('connection.php');

session_start();
$ses=$_SESSION['user_id'];
$fetch="SELECT * FROM user WHERE user_id=$ses";

$users=mysqli_query($conn, $fetch) or die("failed to query database".mysql_error());
$user=mysqli_fetch_array($users);
?>



<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


<html>
<head>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css" rel="stylesheet">

<style>
.container{max-width:900px; margin:auto;}
img{ max-width:100%;}
.inbox_people {
	background: #f8f8f8 none repeat scroll 0 0;
	float: left;
	overflow: hidden;
	width: 40%; border-right:1px solid #c4c4c4;
}
.inbox_msg {
	border: 1px solid #c4c4c4;
	clear: both;
	overflow: hidden;
}
.top_spac{ margin: 20px 0 0;}


.recent_heading {float: left; width:40%;}
.srch_bar {
	display: inline-block;
	text-align: right;
	width: 60%;
}
.headind_srch{ padding:10px 29px 10px 20px; overflow:hidden; border-bottom:1px solid #c4c4c4;}

.recent_heading h4 {
	color: #05728f;
	font-size: 21px;
	margin: auto;
}


.chat_ib {
	float: left;
	padding: 0 0 0 15px;
	width: 88%;
}

.chat_people{ overflow:hidden; clear:both;}
.chat_list {
	border-bottom: 1px solid #c4c4c4;
	margin: 0;
	padding: 18px 16px 10px;
}
.inbox_chat { height: 550px; overflow-y: scroll;}

.active_chat{ background:#ebebeb;}

.incoming_msg_img {
	display: inline-block;
	width: 6%;
}
.received_msg {
	display: inline-block;
	padding: 0 0 0 10px;
	vertical-align: top;
	width: 92%;
}
.received_withd_msg p {
	background: #ebebeb none repeat scroll 0 0;
	border-radius: 3px;
	color: #646464;
	font-size: 14px;
	margin: 0;
	padding: 5px 10px 5px 12px;
	width: 100%;
}
.time_date {
	color: #747474;
	display: block;
	font-size: 12px;
	margin: 8px 0 0;
}
.received_withd_msg { width: 57%;}
.mesgs {
	float: left;
	padding: 30px 15px 0 25px;
	width: 60%;
}

.sent_msg p {
	background: #05728f none repeat scroll 0 0;
	border-radius: 3px;
	font-size: 14px;
	margin: 0; color:#fff;
	padding: 5px 10px 5px 12px;
	width:100%;
}
.outgoing_msg{ overflow:hidden; margin:26px 0 26px;}
.sent_msg {
	float: right;
	width: 46%;
}
.input_msg_write input {
	background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
	border: medium none;
	color: #4c4c4c;
	font-size: 15px;
	min-height: 48px;
	width: 100%;
}

.type_msg {border-top: 1px solid #c4c4c4;position: relative;width: 800px;}
.msg_send_btn {
	background: #05728f none repeat scroll 0 0;
	border: medium none;
	border-radius: 50%;
	color: #fff;
	cursor: pointer;
	font-size: 17px;
	height: 33px;
	
	position: absolute;
	right: 0;
	top: 11px;
	width:35px;
}
.messaging { padding: 0 0 50px 0; }
.msg_history {
	height: 560px;
	width: 800px;
	overflow-y: auto;
}
.text-center{float:left}

</style>

</head>
<body>

<?php
if(isset($_GET['g']))
{    
	$to_id=$_GET['g'];
	$from_id=$_SESSION['user_id'];
	
	$to_details="SELECT * FROM user where user_id='$to_id'";
	$to_users=mysqli_query($conn, $to_details) or die("failed to query database".mysql_error());
	$to_user=mysqli_fetch_assoc($to_users);
	
	
	
	?>



<div class="container">
<div>
<div>
<a href="chat_index.php?g=<?php echo $from_id; ?>" >back</a> 
</div>
</div>

<h3 class="text-center"><?php  echo $to_user['user_image']; ?> <?php echo $to_user['user_name']; ?> </h3>

<div style="float:right; font-size:20px;">
<a href="delete.php?g=<?php echo $to_id; ?>">Delete</a>
<a href="logout.php">Logout</a>
</div>

<?php


if($to_id == $_GET['g'])
{	
	?>


<div class="messaging">
<div class="inbox_msg">

<div class="mesgs">
<div class="msg_history">
<?php

$bot="SELECT * FROM message where send_id='$from_id' AND receive_id='$to_id' OR send_id='$to_id' AND receive_id='$from_id'";

$chats=mysqli_query($conn, $bot) or die("failed to query database".mysql_error());




while($chat=mysqli_fetch_array($chats))
{
	if($from_id == $chat['user_id'])
	{
		?>

<div class="outgoing_msg">
<div class="sent_msg">
<p><?php echo $chat['message']; ?></p>
<span class="time_date"> <?php echo $chat[4]; ?></span> </div>
</div>
<?php
	}
	
	else
	{
		?>
<div class="incoming_msg">
<div class="incoming_msg_img"> <?php  echo $to_user['user_image']; ?> </div>
<div class="received_msg">
<div class="received_withd_msg">
<p><?php echo $chat['message']; ?></p>
<span class="time_date">  <?php echo $chat[4]; ?> </span></div>
</div>
</div>
<?php
	}		
}

}
?>
</div>
<div class="type_msg">
<div class="input_msg_write">

<form name="form"  action="insert_msg.php" method="POST">

<input type="text"  name="receive_id"  value="<?php echo $to_id; ?>"  /hidden>
<input type="text" class="write_msg" name="message"  value="" placeholder="Type a message">

<input type="submit" id="send" class="btn btn-primary"  name="send" value="send" style="height:70px; ">

</div>
</div>

</div>
</div>
</div></div>
<?php } ?>
</body>
</html> 
