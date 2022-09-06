<html>
<head>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>


<?php
include('connection.php');
session_start();
if(isset($_POST['continue']))
{ 
	$user_mail=mysqli_real_escape_string($conn,$_POST['mail']);
	$passwd=mysqli_real_escape_string($conn,$_POST['passwd']);
	
	$insert="select * from user where user_mail='$user_mail' and user_passwd='$passwd'";
	
	$fetch=mysqli_query($conn,$insert);
	$user_row=mysqli_fetch_array($fetch);
	
	$_SESSION['user_id']=$user_row['user_id'];
	
	$update_query="UPDATE user SET `user_id`='$user_row[0]', `user_name`='$user_row[1]', `user_mail`='$user_row[2]',
	`user_passwd`='$user_row[3]',`status`='online', `user_image`='$user_row[5]'  WHERE `user_id`=$user_row[0]";
	$update_value=mysqli_query($conn,$update_query);
	
	
	if(mysqli_num_rows($fetch) > 0)
	{
		
		$s="select *  from user";
		$q=mysqli_query($conn, $s);
		
		?>
		<p> welcome <?php echo $user_row['user_name']; ?></p>

		<p>Send Message to:</p>
		<?php
		if(isset($q))
		{
			while($f=mysqli_fetch_array($q))
			{  
				
				?>
				<ul>
				<li><?php echo $f['user_image']; ?>  <a href="logindp.php?g=<?php echo $f['user_id']; ?>"> <?php echo $f['user_name']; ?> </a> 
				 </ul>
				 <?php

			}   
		}
	} 
	
}
else
{
	echo "user doesn't exists";
}
?>
</body>
