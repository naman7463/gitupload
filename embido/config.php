<?php 
// local connection
if($_SERVER['SERVER_NAME'] == 'localhost')
{
	$_hostName = "localhost";
     $_userName = "root";
     $_password = "";
     $_database = "embido";
	// url upto folder for image uploading and display
     $_picture_url = "http://localhost:8012/embido/upload/";
	 // base url for giving full path
	 $base_url = "http://localhost:8012/embido/";
	 // default image , if no image selected
     $_default_profile_pic = "embido_default.png";
       // connection script
        $con = mysqli_connect($_hostName, $_userName, $_password,$_database);
        if (!$con) {
            die(mysqli_error());
        }
}
else
{
	// connection for server
	$_hostName = "localhost";
     $_userName = "hireouts_embido";
     $_password = "!@#ASD123";
     $_database = "hireouts_embido";
	// url upto folder for image uploading and display
     $_picture_url = "http://hireoutsource.com/embido/upload/";
	 // base url for giving full path
	 $base_url = "http://hireoutsource.com/embido/";
	 // default image , if no image selected
     $_default_profile_pic = "embido_default.png";
       // connection script
        $con = mysqli_connect($_hostName, $_userName, $_password,$_database);
        if (!$con) {
            die(mysqli_error());
        }
}
   
?>