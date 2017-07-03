<?php 
require_once 'check_session.php';
require_once 'code/config.php';
require_once 'header.php' ; 
$user_id = base64_decode($_GET['code']);
$sql_posts = "delete from `user_sign_up` where `user_id` = '$user_id' ";
$query_posts = mysqli_query($con,$sql_posts);
$affected_row = mysqli_affected_rows($con);
if($affected_row > 0)
{
	echo '<script>alert("User deleted successfully");</script>';
	$url = "users.php";
	echo '<script>window.location.href = "'.$url.'";</script>';
}
else
{
	echo '<script>alert("User can not be deleted");</script>';
	$url = "users.php";
	echo '<script>window.location.href = "'.$url.'";</script>';
}
?>