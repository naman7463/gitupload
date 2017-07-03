<?php 
require_once 'check_session.php';
require_once 'code/config.php';
require_once 'header.php' ; 
$sql_users = "select * from `vendor_sign_up` order by `vendor_id` desc ";
$query_users = mysqli_query($con,$sql_users);
//echo $_SERVER['DOCUMENT_ROOT'];exit;
?>

 

            <!-- sidebar menu -->
            <?php require_once 'sidebar.php'; ?>
        </div>

        <!-- top navigation -->
        <?php require_once 'top_nav.php'; ?>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
		<script>
		function editUsers(vendor_id)
		{
			//alert(vendor_id);
			var administrator = document.getElementById("administrator").value;
			var brand_name = document.getElementById("brand_name").value;
			var description = document.getElementById("description").value;
			var reward_description = document.getElementById("reward_description").value;
			var redemption_description = document.getElementById("redemption_description").value;
			
			//edit_user_id
			
			// creating object for sending file
			var fd = new FormData();
			var file_data = $('#vendor_image')[0].files; // for multiple files
			  for(var i = 0;i<file_data.length;i++)
			  {
				fd.append("vendor_image", file_data[i]);
			}
			fd.append('vendor_id',vendor_id);
			fd.append('administrator',administrator);
			fd.append('brand_name',brand_name);
			fd.append('description',description);
			fd.append('reward_description',reward_description);
			fd.append('redemption_description',redemption_description);
			
			
			//fd.append("profile_pic1", file_data[0]);
			$.ajax({ url: 'edit_vendor.php',
						 data: fd,
						 type: 'post',
						 contentType: false,
						 processData: false,
						 success: function(output) {
							 //alert(output);
									  alert("Info updated successfully");
									  window.location.href = "vendors.php";
									  
									  
								  }
					});
		}
		</script>
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Posts <small>Posts by users</small></h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
				<!--
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
				  -->
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>POSTS </h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                   
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>S. No.</th>
                          <th>Administrator</th>
                          <th>Brand Name</th>
						  <th>Description</th>
						  <th>Reward Description</th>
						  <th>Redemption Description</th>
						  <th>Vendor Image</th>
                          <td>Action</td>
                        </tr>
                      </thead>


                      <tbody>
					  <?php
					  $i = 1;
					  while($res_users = mysqli_fetch_assoc($query_users))
					  {
						  if(isset($_GET['code']) && base64_decode($_GET['code']) == $res_users['vendor_id'])
						  {
					  ?>
							<tr>
							<td></td>
                          <td><input style="width:60%;height:30px;" name="administrator" id="administrator" type="text" value="<?php echo $res_users['administrator']; ?>" /></td>
                          <td><input style="width:60%;height:30px;" name="brand_name" id="brand_name" type="text" value="<?php echo $res_users['brand_name']; ?>" /></td>
						  <td><input style="width:60%;height:30px;" name="description" id="description" type="text" value="<?php echo $res_users['description']; ?>" /></td>
						  <td><input style="width:60%;height:30px;" name="reward_description" id="reward_description" type="text" value="<?php echo $res_users['reward_description']; ?>" /></td>
						  <td><input style="width:60%;height:30px;" name="redemption_description" id="redemption_description" type="text" value="<?php echo $res_users['redemption_description']; ?>" /></td>
                          <td>
						  
						  <input type="file" name="vendor_image" id="vendor_image" />
						  <img src="<?php echo $picture_url.$res_users['vender_image']; ?>"  height="50" width="50" />
						  </td>
                      
						  <td>
						  <button onclick="editUsers(<?php echo $res_users['vendor_id']; ?>)" style="color:green;" title="Save Post"  >Save</button>
						  </br>
						  
						  </td>
                        </tr>
						<?php
							  
						  }
						  else
						  {
							  
						  
					  ?>
                        <tr>
							<td><?php echo $i; ?></td>
                          <td><?php echo $res_users['administrator']; ?></td>
                          <td><?php echo $res_users['brand_name']; ?></td>
						   <td><?php echo $res_users['description']; ?></td>
						    <td><?php echo $res_users['reward_description']; ?></td>
							 <td><?php echo $res_users['redemption_description']; ?></td>
                          <td><img src="<?php echo $picture_url.$res_users['vender_image']; ?>"  height="50" width="50" /></td>
                          
						  <td>
						  <a style="color:blue;" title="Edit Post" href="<?php echo 'vendors.php?code='.base64_encode($res_users['vendor_id']); ?>" >Edit</a>
						  </br>
						  <a style="color:Red;" onclick="return confirm('Are you sure you want to Delete?');" title="Delete Post" href="<?php echo 'delete_vendor.php?code='.base64_encode($res_users['vendor_id']); ?>" >Delete</a>
						  </td>
                        </tr>
                        <?php
						$i++;
						  }
						}
						?>
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
    
                  </div>
                </div>
				
              </div>
           
       
        
        <!-- /page content -->

        <!-- footer content -->
        <?php require_once 'footer.php'; ?>