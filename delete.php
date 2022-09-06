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
	height: 660px;
	width: 800px;
	overflow-y: auto;
}
.text-center{float:left}







.login-box {
	position: absolute;
	top: 50%;
	left: 50%;
	width: 400px;
	padding: 40px;
	transform: translate(-50%, -50%);
	background: rgba(0,0,0,.5);
	box-sizing: border-box;
	box-shadow: 0 15px 25px rgba(0,0,0,.6);
	border-radius: 10px;
}

.login-box h2 {
	margin: 0 0 30px;
	padding: 0;
	color: #fff;
	text-align: center;
}

.login-box .user-box {
	position: relative;
}

.login-box .user-box input {
	width: 100%;
	padding: 10px 0;
	font-size: 16px;
	color: #fff;
	margin-bottom: 30px;
	border: none;
	border-bottom: 1px solid #fff;
	outline: none;
	background: transparent;
}
.login-box .user-box label {
	position: absolute;
	top:0;
	left: 0;
	padding: 10px 0;
	font-size: 16px;
	color: #fff;
	pointer-events: none;
	transition: .5s;
}

.login-box .user-box input:focus ~ label,
.login-box .user-box input:valid ~ label {
	top: -20px;
	left: 0;
	color: #03e9f4;
	font-size: 12px;
}

.login-box form a {
	position: relative;
	display: inline-block;
	padding: 10px 20px;
	color: #03e9f4;
	font-size: 16px;
	text-decoration: none;
	text-transform: uppercase;
	overflow: hidden;
	transition: .5s;
	margin-top: 40px;
	letter-spacing: 4px
}

.login-box a:hover {
	background: #03e9f4;
	color: #fff;
	border-radius: 5px;
	box-shadow: 0 0 5px #03e9f4,
	0 0 25px #03e9f4,
	0 0 50px #03e9f4,
	0 0 100px #03e9f4;
}

.login-box a span {
	position: absolute;
	display: block;
}

.login-box a span:nth-child(1) {
	top: 0;
	left: -100%;
	width: 100%;
	height: 2px;
	background: linear-gradient(90deg, transparent, #03e9f4);
	animation: btn-anim1 1s linear infinite;
}

@keyframes btn-anim1 {
	0% {
		left: -100%;
	}
	50%,100% {
		left: 100%;
	}
}

.login-box a span:nth-child(2) {
	top: -100%;
	right: 0;
	width: 2px;
	height: 100%;
	background: linear-gradient(180deg, transparent, #03e9f4);
	animation: btn-anim2 1s linear infinite;
	animation-delay: .25s
}

@keyframes btn-anim2 {
	0% {
		top: -100%;
	}
	50%,100% {
		top: 100%;
	}
}

.login-box a span:nth-child(3) {
	bottom: 0;
	right: -100%;
	width: 100%;
	height: 2px;
	background: linear-gradient(270deg, transparent, #03e9f4);
	animation: btn-anim3 1s linear infinite;
	animation-delay: .5s
}

@keyframes btn-anim3 {
	0% {
		right: -100%;
	}
	50%,100% {
		right: 100%;
	}
}

.login-box a span:nth-child(4) {
	bottom: -100%;
	left: 0;
	width: 2px;
	height: 100%;
	background: linear-gradient(360deg, transparent, #03e9f4);
	animation: btn-anim4 1s linear infinite;
	animation-delay: .75s
}

@keyframes btn-anim4 {
	0% {
		bottom: -100%;
	}
	50%,100% {
		bottom: 100%;
	}
}









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
	<!-- <a href="chat_index.php?g=<?php echo $from_id; ?>" style="font-size: 0px;">back</a> -->
	</div>
	
	<h3 class="text-center"><?php  echo $to_user['user_image']; ?> <?php echo $to_user['user_name']; ?> </h3>
	
	<div style="float:right; font-size:20px;">
	
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
				<a href="delete_chat.php?m_id=<?php echo $chat[5];?>&amp;to_id=<?php echo $to_id ?>">
				<span></span>
				<span></span>
				<span></span>
				<span></span>
				del
				</a>
				
				</div>
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
				
				<a href="delete_chat.php?m_id=<?php echo $chat[5];?>&amp;to_id=<?php echo $to_id ?>">
				<span></span>
				<span></span>
				<span></span>
				<span></span>
				del
				</a>
				
				</div>
				</div>
				<?php
			}		
		}
		
	}
	?>
	</div>
	
	
	</div>
	</div>
	</div></div>
	<?php } ?>
	</body>
	</html> 
	
