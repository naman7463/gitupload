<?php 
require_once 'check_session.php';
require_once 'code/config.php';
require_once 'header.php' ; 

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email_id = $_POST['email_id'];
$edit_user_id = $_POST['edit_user_id'];
// editing user
	$sql_users = "update `user_sign_up` set `first_name` = '$first_name' , `last_name` = '$last_name', `email_id` = '$email_id'  where `user_id` = '$edit_user_id' ";


// update record


$query_posts = mysqli_query($con,$sql_users);
$affected_row = mysqli_affected_rows($con);
if($affected_row > 0)
{
	echo 'success';
	
}
else
{
	echo 'failure';
}
?>