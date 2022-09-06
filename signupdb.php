<?php
include ('connection.php');
?>
<html>
<head></head>
<body>

<?php
if(isset($_POST['continue']))
{	
	
	$user_name=mysqli_real_escape_string($conn,$_POST['name']);
	$user_mailid=mysqli_real_escape_string($conn,$_POST['email']);
	$user_passwd=mysqli_real_escape_string($conn,$_POST['passwd']);
	
	
 	$check_user="select user_mail from user where user_mail='$user_mailid'";
	

	$regvalues=mysqli_query($conn, $check_user);
	
	$check_values=mysqli_num_rows($regvalues);
	
	if($check_values > 0)
	{
		echo "reg not done || user already exists";	
	}
	else 
	{   
		if(isset($_FILES['files']))
		{
			$tmp_name=$_FILES['files']['tmp_name'];
			$filename=$_FILES['files']['name'];
			$desired_dir="pic";
			
			if(is_dir($desired_dir)==false)
			{
				mkdir("pic",0700);		
				
			}
			
			if(move_uploaded_file($tmp_name,"$desired_dir/".$filename))
			{
				
				$profile_pic='<img src="pic/' .$filename .'" width="50" style=" border-radius: 50%;" alt="'.pathinfo($filename,PATHINFO_FILENAME).'">';
				
				$t=time();
				$insert="INSERT INTO user(`user_id`,`user_name`,`user_mail`,`user_passwd`,`user_image`) values('$t','$user_name','$user_mailid','$user_passwd','$profile_pic')";
				echo $insert;
				$regvalues=mysqli_query($conn,$insert);
		
					if(isset($regvalues))
						{
							echo "regdone";
							echo "<br><br>";
			
						}
				?>
			
			<?php		
		}
		
	}
		
	
}
 header("location: login_chat.php");
}

?>
</body>
</html>




