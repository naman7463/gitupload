<?php
session_start();
require_once 'code/config.php';
if($_SESSION['user_id'] == '')
{
			$url = base_url()."index.php";
			echo '<script>window.location.href="'.$url.'"</script>';

}
?>