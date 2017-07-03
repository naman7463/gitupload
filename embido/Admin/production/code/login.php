<?php
require_once 'config.php';

if(isset($_POST['login']))
{
	$email_id = $_POST['username'];
	$password = $_POST['password'];
	
	// query to get user from database
	$sql = "select * from `user_sign_up` where `email_id` = '$email_id' and `password` = '$password' and `user_type` = 'Admin'";
	$query = mysqli_query($con,$sql);
	$count = mysqli_num_rows($query);
	if($count > 0)
	{
		$data = mysqli_fetch_assoc($query);
		session_start();
		$_SESSION['user_id'] = $data['user_id'];
		$_SESSION['email_id'] = $data['email_id'];
		//echo '<script>alert("in success after query");</script>';
		$url = "../dashboard.php?status=success";
		echo '<script>window.location.href="'.$url.'"</script>';
	}
	else
	{
		//echo '<script>alert("in failure after query");</script>';
		$url = "../index.php?status=failure";
		echo '<script>window.location.href="'.$url.'"</script>';
	}
	
	
	
}
else
{
		//echo '<script>alert("in failure before query");</script>';
		$url = base_url()."admin_panel/production/index.php?status=failure";
		echo '<script>window.location.href="'.$url.'"</script>';
}

?>