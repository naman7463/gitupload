<?php
error_reporting(0);
if(isset($_POST['code']) && $_POST['code'] == 'EMBIDO080916')
{
if($_SERVER['REQUEST_METHOD'] != "POST")
{
  echo "Only post requests allowed";
  exit;
}
 include 'config.php';
 
if (isset($_POST['title_name']) && isset($_POST['description']) && isset($_POST['brand_name'])) {
            $title_name = $_POST['title_name'];
            $description = $_POST['description'];
			$brand_name = $_POST['brand_name'];
            $user_id = $_POST['user_id'];
			$post_image_name = time().$_FILES['post_image']['name'];
			$post_image_path = $_FILES['post_image']['tmp_name'];
			// upload image
			if(!empty($_FILES['post_image']['name']))
			{
				move_uploaded_file($post_image_path,'upload/'.$post_image_name);
			}
			else
			{
				$post_image_name = '';
			}
			// end
			
			// database query
			$sql = "insert into `posts` (`title_name`,`description`,`brand_name`,`post_image`,`user_id`) values('".$title_name."','".$description."','".$brand_name."','".$post_image_name."','".$user_id."')";
			//print_r($sql);
			$res = mysqli_query($con,$sql);
			$post_id = mysqli_insert_id($con);
			if($post_id != '')
			{
				if(!empty($_FILES['post_image']['name']))
				{
					$image = $_picture_url.$post_image_name;
				}
				else
				{
					$image = '';
				}
				$row['result'] = "success";
				$row['error'] = "";
				$row['data'] = array("title_name" => $title_name , "description" => $description , "post_image" => $image, "user_id" => $user_id ,"post_id" => $post_id);
				$row['message'] = "";
				$_posts[] = $row;
				echo json_encode($_posts);
				exit;
			}
			else
			{
				$_posts[] = array("result" => "failure","error" => "error" ,"data" => array() ,"message" => "Can not add this post");
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

