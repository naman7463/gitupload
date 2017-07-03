<?php 
require_once 'check_session.php';
require_once 'code/config.php';
require_once 'header.php' ; 

$post_id = $_POST['post_id'];
$post_title = $_POST['post_title'];
$post_desc = $_POST['post_desc'];
$post_brand = $_POST['post_brand'];

// update record

$sql_posts = "update `posts` set `title_name` = '$post_title' , `description` = '$post_desc', `brand_name` = '$post_brand'  where `post_id` = '$post_id' ";
$query_posts = mysqli_query($con,$sql_posts);
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