<?php
session_start();
require_once 'code/config.php';
if(isset($_SESSION['user_id']) && $_SESSION['user_id'] != '')
{
			$url = "dashboard.php";
			echo '<script>window.location.href="'.$url.'"</script>';

}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Embido</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="https://colorlib.com/polygon/gentelella/css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
	
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="code/login.php" id="login_form" name="login_form" method="post">
              <h1>Embido Login</h1>
              <div>
                <input type="email" class="form-control" name="username" id="username" placeholder="Username" required="" />
              </div>
              <div>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required="" />
              </div>
              <div>
                <button name="login" id="login" class="btn btn-default submit">Log in</button>
                <a class="reset_pass" href="#">Lost your password?</a>
              </div>

              <div class="clearfix"></div>
            </form>
          </section>
        </div>

        
      </div>
    </div>
	
  </body>
</html>
