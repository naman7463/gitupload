<?php
mysqli_report(MYSQLI_REPORT_STRICT);

try {
	// local
	$con = mysqli_connect('localhost', 'hireouts_embido', '!@#ASD123', 'hireouts_embido') ;
	 //server
	 // $con = mysqli_connect('localhost', 'acswebde_kig', 'kig2461', 'acswebde_2461_keyindiagraphics') ;
} catch (Exception $e ) {
     echo "Service unavailable";
     echo "message: " . $e->message;   // not in live code obviously...
     exit;
}

// base_url function
function base_url()
{
	//local
	$url = 'http://hireoutsource.com/embido/';
	//server
	//$url = 'http://hireoutsource.com/embido/';
	return $url;
}

$picture_url = "http://hireoutsource.com/embido/upload/";
?>