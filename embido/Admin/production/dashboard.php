<?php 
error_reporting(0);
require_once 'check_session.php';
require_once 'code/config.php';
require_once 'header.php' ; 
// feching total users
$sql_total_user = "select count(user_id) as `total_users` from `user_sign_up` where `user_type` != 'Admin' ";
$query_total_user = mysqli_query($con,$sql_total_user);
$res_total_user = mysqli_fetch_assoc($query_total_user);
// end

// feching total posts
$sql_total_post = "select count(post_id) as total_post from `posts` ";
$query_total_post = mysqli_query($con,$sql_total_post);
$res_total_post = mysqli_fetch_assoc($query_total_post);
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
          <div class="">
            <div class="row top_tiles">
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-caret-square-o-right"></i></div>
                  <div class="count"><?php echo $res_total_user['total_users']; ?></div>
                  <h3>New Sign Ups</h3>
                  <p>Total users at Gofisik</p>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-comments-o"></i></div>
                  <div class="count"><?php echo $res_total_post['total_post']; ?></div>
                  <h3>Total Posts</h3>
                  <p>Total posts by users at Gofisik</p>
                </div>
              </div>
			  <!--
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-sort-amount-desc"></i></div>
                  <div class="count">179</div>
                  <h3>New Sign ups</h3>
                  <p>Lorem ipsum psdea itgum rixt.</p>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-check-square-o"></i></div>
                  <div class="count">179</div>
                  <h3>New Sign ups</h3>
                  <p>Lorem ipsum psdea itgum rixt.</p>
                </div>
              </div>
			  -->
            </div>

            
             
            </div>
		</div>


            
        <!-- /page content -->

        <!-- footer content -->
        <?php echo 'footer.php'; ?>