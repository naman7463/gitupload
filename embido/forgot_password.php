<?php
if($_POST['code'] == 'EMBIDO080916')
{
if($_SERVER['REQUEST_METHOD'] != "POST")
{
  echo "Only post requests allowed";
  exit;
}
 include 'config.php';
if (isset($_POST['email_id']) && $_POST['email_id'] != "") 
{
	        $email_id = $_POST['email_id'];
     		$sql = "select password from  `user_sign_up` where `email_id` = '".$email_id."' ";
			$res = mysqli_query($con,$sql);
			$result_count = mysqli_num_rows($res);
			
			if($result_count > 0)
			{
				$results = mysqli_fetch_array($res);
				$password = $results['password'];
				//print_r($password);die;
				// email sending code starts here
				$to = $email_id;
				$subject = "Password recovery";
				$email = "Your password is :  '".$password."'";
				$headers   = array();
				$headers[] = "MIME-Version: 1.0";
				$headers[] = "Content-type: text/plain; charset=iso-8859-1";
				$headers[] = "From: EMBIDO <embido@embido.com>";
				//$headers[] = "Bcc: JJ Chong <bcc@domain2.com>";
				//$headers[] = "Reply-To: Recipient Name <receiver@domain3.com>";
				$headers[] = "Subject: {'".$subject."'}";
				$headers[] = "X-Mailer: PHP/".phpversion();

				if(mail($to, $subject, $email, implode("\r\n", $headers)))
				{
					$msg = 'Message sent on email id';
				}
				else
				{
					$msg = "Email id is not valid";
				}
				// email code end here
				$row['result'] = "success";
				$row['error'] = "";
				$row['data'] = "";
				$row['message'] = $msg;
				$_posts[] = $row;
				echo json_encode($_posts);
				exit;
			}
			else
			{
				$_posts[] = array("result" => "failure","error" => "error" ,"data" => array() ,"message" => "Email id does not exists");
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

