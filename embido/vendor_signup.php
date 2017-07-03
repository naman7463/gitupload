<?php
if(isset($_POST['code']) && $_POST['code'] == 'EMBIDO080916')
{
if($_SERVER['REQUEST_METHOD'] != "POST")
{
  echo "Only post requests allowed";
  exit;
}
 include 'config.php';
 
if (isset($_POST['administrator']) && isset($_POST['brand_name']) && isset($_POST['description']) && $_POST['reward_description'] != '') {
            $administrator = $_POST['administrator'];
            $brand_name = $_POST['brand_name'];
			$description = $_POST['description'];
            $reward_description = $_POST['reward_description'];
			$redemption_description = $_POST['redemption_description'];
			$vender_image_name = time().$_FILES['vender_image']['name'];
			$vender_image_path = $_FILES['vender_image']['tmp_name'];
			// upload image
			if(!empty($_FILES['vender_image']['name']))
			{
				move_uploaded_file($vender_image_path,'upload/'.$vender_image_name);
			}
			else
			{
				$vender_image_name = '';
			}
			// end
			
			// database query
			$sql = "insert into `vendor_sign_up` (`administrator`,`brand_name`,`description`,`reward_description`,`redemption_description`,`vender_image`) values('".$administrator."','".$brand_name."','".$description."','".$reward_description."','".$redemption_description."','".$vender_image_name."')";
			//print_r($sql);
			$res = mysqli_query($con,$sql);
			$vendor_id = mysqli_insert_id($con);
			if($vendor_id != '')
			{
                                if(!empty($_FILES['vender_image']['name']))
				{
					$image = $_picture_url.$vender_image_name;
				}
				else
				{
					$image = '';
				}
				$row['result'] = "success";
				$row['error'] = "";
				$row['data'] = array("administrator" => $administrator , "brand_name" => $brand_name , "description" => $description,"reward_description" => $reward_description,"vender_image_name" => $image, "vendor_id" => $vendor_id);
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

