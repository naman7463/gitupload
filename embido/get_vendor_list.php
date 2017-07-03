<?php
if(isset($_POST['code']) && $_POST['code'] == 'EMBIDO080916')
{
if($_SERVER['REQUEST_METHOD'] != "POST")
{
  echo "Only post requests allowed";
  exit;
}
 include 'config.php';
 

			$sql = "select * from `vendor_sign_up`";
			//print_r($sql);
			$query = mysqli_query($con,$sql);
			$num_of_rows = mysqli_num_rows($query);
			if($num_of_rows > 0)
			{
				while($data = mysqli_fetch_assoc($query))
				{
					if(!empty($data))
					{
						if(!empty($data['vender_image']))
						{
							$image = $_picture_url.$data['vender_image'];
						}
						else
						{
							$image = '';
						}
						$row_data[] = array("vendor_id" => $data['vendor_id'],"administrator" => $data['administrator'] , "brand_name" => $data['brand_name'] , "description" => $data['description'],"reward_description" => $data['reward_description'],"vender_image_name" => $image, "vendor_id" => $data['redemption_description']);
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
	echo 'Authentication failure';
}
?>

