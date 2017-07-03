<?php 
require_once 'check_session.php';
require_once 'code/config.php';
require_once 'header.php' ; 

$vendor_id = $_POST['vendor_id'];
$administrator = $_POST['administrator'];
$brand_name = $_POST['brand_name'];
$description = $_POST['description'];
$reward_description = $_POST['reward_description'];
$redemption_description = $_POST['redemption_description'];
if(isset($_FILES['vendor_image']['name']))
{
	$file_name = time().$_FILES['vendor_image']['name'];
	$file_path = $_FILES['vendor_image']['tmp_name'];
	// image path
	$file_path = $_FILES['vendor_image']['tmp_name'];
	$upload_path = "../../upload/";
	move_uploaded_file($file_path,$upload_path.$file_name);
}
// editing user
if(!empty($_FILES['vendor_image']['name']))
{
	$sql_vendor = "update `vendor_sign_up` set `administrator` = '$administrator' , `brand_name` = '$brand_name', `description` = '$description', `reward_description` = '$reward_description', `redemption_description` = '$redemption_description', `vender_image` = '$file_name'  where `vendor_id` = '$vendor_id' ";
}
else
{
	$sql_vendor = "update `vendor_sign_up` set `administrator` = '$administrator' , `brand_name` = '$brand_name', `description` = '$description', `reward_description` = '$reward_description', `redemption_description` = '$redemption_description'  where `vendor_id` = '$vendor_id' ";
}
// update record
$query_posts = mysqli_query($con,$sql_vendor);
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