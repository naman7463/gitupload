<?php 
require_once 'check_session.php';
require_once 'code/config.php';
require_once 'header.php' ; 
$sql_posts = "select * from `posts` inner join `user_sign_up` on `posts`.`user_id` = `user_sign_up`.`user_id` order by `post_id` desc";
$query_posts = mysqli_query($con,$sql_posts);

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
		function editPost(post_id)
		{
			var post_title = document.getElementById("edit_post_title").value;
			var post_desc = document.getElementById("edit_post_address").value;
			var edit_post_brand = document.getElementById("edit_post_brand").value;
			//var post_place_name = document.getElementById("edit_place_name").value;
			$.ajax({ url: 'edit_post.php',
						 data: {post_title: post_title,post_desc:post_desc,post_id:post_id,post_brand:edit_post_brand},
						 type: 'post',
						 success: function(output) {
							 
									  alert("Info updated successfully");
									  window.location.href = "post.php";
									  
									  
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
                          <th>Post Title</th>
						  <th>Brand</th>
                          <th>Description</th>
                          <th>Created By</th>
						  <th>Action</th>
                        </tr>
                      </thead>


                      <tbody>
					  <?php
					  while($res_posts = mysqli_fetch_assoc($query_posts))
					  {
						  if(isset($_GET['code']) && base64_decode($_GET['code']) == $res_posts['post_id'])
						  {
					  ?>
							<tr>
                          <td><input name="edit_post_title" id="edit_post_title" type="text" value="<?php echo $res_posts['title_name']; ?>" /></td>
						  <td><input name="edit_post_title" id="edit_post_brand" type="text" value="<?php echo $res_posts['brand_name']; ?>" /></td>
                          <td><input name="edit_post_address" id="edit_post_address" type="text" value="<?php echo $res_posts['description']; ?>" /></td>
                          <td><?php echo $res_posts['first_name'].' '.$res_posts['last_name']; ?></td>
                          <td>
						  <button onclick="editPost(<?php echo $res_posts['post_id']; ?>)" style="color:green;" title="Save Post"  >Save</button>
						  </br>
						  
						  </td>
                        </tr>
						<?php
							  
						  }
						  else
						  {
							  
						  
					  ?>
                        <tr>
                          <td><?php echo $res_posts['title_name']; ?></td>
						   <td><?php echo $res_posts['brand_name']; ?></td>
                          <td><?php echo $res_posts['description']; ?></td>
                          <td><?php echo $res_posts['first_name'].' '.$res_posts['last_name']; ?></td>
						  <td>
						  <a style="color:blue;" title="Edit Post" href="<?php echo 'post.php?code='.base64_encode($res_posts['post_id']); ?>" >Edit</a>
						  </br>
						  <a style="color:Red;" onclick="return confirm('Are you sure you want to Delete?');" title="Delete Post" href="<?php echo 'delete_post.php?code='.base64_encode($res_posts['post_id']); ?>" >Delete</a>
						  </td>
                        </tr>
                        <?php
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