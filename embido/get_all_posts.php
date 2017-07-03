<?php
if(isset($_POST['code']) && $_POST['code'] == 'EMBIDO080916')
{
if($_SERVER['REQUEST_METHOD'] != "POST")
{
  echo "Only post requests allowed";
  exit;
}
 include 'config.php';
 
			if(!empty($_POST['user_id']))
			{
			$user_id = $_POST['user_id'];
			$sql = "select * from `posts` where user_id = '".$user_id."'";
			//print_r($sql);
			$query = mysqli_query($con,$sql);
			$num_of_rows = mysqli_num_rows($query);
				if($num_of_rows > 0)
				{
					while($data = mysqli_fetch_assoc($query))
					{
						if(!empty($data))
						{
							if(!empty($data['post_image']))
							{
								$image = $_picture_url.$data['post_image'];
							}
							else
							{
								$image = '';
							}
							$row_data[] = array("post_id" => $data['post_id'] , "title_name" => $data['title_name'] , "description" => $data['description'],"brand_name" => $data['brand_name'],"post_image" => $image, "user_id" => $data['user_id']);
						}
						
					}
					$row['result'] = "success";
					$row['error'] = "";
					$row['data'] = $row_data;
					$row['message'] = "";
					$_posts[] = $row;
					echo json_encode($_posts);
					exit;
				}
				else
				{
					$_posts[] = array("result" => "failure","error" => "error" ,"data" => array() ,"message" => "No data found");
					echo json_encode($_posts);
					exit;
				}
			}
			else
			{
				$_posts[] = array("result" => "failure","error" => "error" ,"data" => array() ,"message" => "Please fillout all the fields");
					echo json_encode($_posts);
					exit;
			}
		
		
	
}
else
{
	echo 'Authentication failure';
}
?>

