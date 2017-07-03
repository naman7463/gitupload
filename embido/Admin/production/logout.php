<?php
require_once 'code/config.php';
session_start();
// login table update
$_SESSION['user_id'];
$_SESSION['email_id'];

unset($_SESSION['user_id']);
unset($_SESSION['email_id']);

session_unset($_SESSION['user_id']);
session_unset($_SESSION['email_id']);
session_destroy();
session_unset();
$url ="index.php";
			echo '<script>window.location.href="'.$url.'"</script>';
?>