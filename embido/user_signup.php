<?php
if(isset($_POST['code']) && $_POST['code'] == 'EMBIDO080916')
{
if($_SERVER['REQUEST_METHOD'] != "POST")
{
  echo "Only post requests allowed";
  exit;
}
 include 'config.php';
 
if (isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['password']) && $_POST['email_id'] != '') {
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
			$email_id = $_POST['email_id'];
            $password = $_POST['password'];
            $user_image_name = time().$_FILES['user_image']['name'];
			$user_image_path = $_FILES['user_image']['tmp_name'];
			// upload image
			if(!empty($_FILES['user_image']['name']))
			{
				move_uploaded_file($post_image_path,'upload/'.$user_image_name);
			}
			else
			{
				$user_image_name = '';
			}
			// end
			// database query
			$sql = "insert into `user_sign_up` (`first_name`,`last_name`,`email_id`,`password`,`user_image`) values('".$first_name."','".$last_name."','".$email_id."','".$password."','".$user_image_name."')";
			//print_r($sql);
			$res = mysqli_query($con,$sql);
			$user_id = mysqli_insert_id($con);
			if($user_id != '')
			{
				$row['result'] = "success";
				$row['error'] = "";
				$row['data'] = array("first_name" => $first_name , "last_name" => $last_name , "email_id" => $email_id,"password" => $password,"user_id" => $user_id);
				$row['message'] = "";
				$_posts[] = $row;
				echo json_encode($_posts);
				exit;
			}
			else
			{
				$_posts[] = array("result" => "failure","error" => "error" ,"data" => array() ,"message" => "Email id already exists");
				echo json_encode($_posts);
				exit;
			}
			
		}
		
		else
		{
			$_posts[] = array("result" => "failure","error" => "error" ,"data" => array() ,"message" => "Please fill all required parameters");
			echo json_encode($_posts);
			exit;
			
		}
		
}
else
{
	echo 'Authentication failure';
}
?>

