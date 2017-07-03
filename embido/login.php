<?php
if($_POST['code'] == 'EMBIDO080916')
{
if($_SERVER['REQUEST_METHOD'] != "POST")
{
  echo "Only post requests allowed";
  exit;
}
include 'config.php';
if ($_POST['email_id'] != '') 
{
            $email_id = $_POST['email_id'];
            $password = $_POST['password'];
            
			$sql = "select * from  `user_sign_up` where `email_id` = '".$email_id."' and  `password` = '".$password."' ";
			//print_r($sql);die;
			$res = mysqli_query($con,$sql);
			$result_count = mysqli_num_rows($res);
			
			if($result_count > 0)
			{
				$results = mysqli_fetch_array($res);				
				// response
				$row['result'] = "success";
				$row['error'] = "";
				$row['data'] = array("user_id" => $results['user_id'],"first_name" => $results['first_name'],"last_name" => $results['last_name'],"email_id" => $results['email_id']);
				$row['message'] = "Login successfull";
				$_posts[] = $row;
				echo json_encode($_posts);
				exit;
			}
			else
			{
                            
                           
				$_posts[] = array("result" => "failure","error" => "error" ,"data" => array() ,"message" => "Invalid Login");
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

