<?php 
require_once 'check_session.php';
require_once 'code/config.php';
require_once 'header.php' ; 
$sql_users = "select * from `user_sign_up` where user_type != 'Admin' order by `user_id` desc ";
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
		function editUsers(user_id)
		{
			//alert(user_id);
			var first_name = document.getElementById("edit_first_name").value;
			var last_name = document.getElementById("edit_last_name").value;
			var email_id = document.getElementById("edit_emailid").value;
			//edit_user_id
			//var edit_user_id = document.getElementById("edit_user_id").value;
			//fd.append("profile_pic1", file_data[0]);
			$.ajax({ url: 'edit_users.php',
						 data: {first_name:first_name,last_name:last_name,email_id:email_id,edit_user_id:user_id},
						 type: 'post',
						 //contentType: false,
						 //processData: false,
						 success: function(output) {
							 //alert(output);
									  alert("Info updated successfully");
									  window.location.href = "users.php";
									  
									  
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
                          <th>First Name</th>
                          <th>Last Name</th>
                          <td>Email Id</td>
						  <td>Action</td>
                        </tr>
                      </thead>


                      <tbody>
					  <?php
					  $i=1;
					  while($res_users = mysqli_fetch_assoc($query_users))
					  {
						  if(isset($_GET['code']) && base64_decode($_GET['code']) == $res_users['user_id'])
						  {
					  ?>
							<tr>
							<td><?php echo $i;?></td>
                          <td><input name="edit_first_name" id="edit_first_name" type="text" value="<?php echo $res_users['first_name']; ?>" />
						  <input name="edit_user_id" id="edit_user_id" type="hidden" value="<?php echo $res_users['user_id']; ?>" />
						  </td>
						  <td><input name="edit_last_name" id="edit_last_name" type="text" value="<?php echo $res_users['last_name']; ?>" /></td>
                          <td><input name="edit_emailid" id="edit_emailid" type="text" value="<?php echo $res_users['email_id']; ?>" /></td>
                          
						  <td>
						  <button onclick="editUsers(<?php echo $res_users['user_id']; ?>)" style="color:green;" title="Save Post"  >Save</button>
						  </br>
						  
						  </td>
                        </tr>
						<?php
							  
						  }
						  else
						  {
							  
						  
					  ?>
                        <tr>
							<td><?php echo $i;?></td>
                          <td><?php echo $res_users['first_name']; ?></td>
                          <td><?php echo $res_users['last_name']; ?></td>
                          <td><?php echo $res_users['email_id']; ?></td>
                          <td>
						  <a style="color:blue;" title="Edit Post" href="<?php echo 'users.php?code='.base64_encode($res_users['user_id']); ?>" >Edit</a>
						  </br>
						  <a style="color:Red;" onclick="return confirm('Are you sure you want to Delete?');" title="Delete Post" href="<?php echo 'delete_users.php?code='.base64_encode($res_users['user_id']); ?>" >Delete</a>
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