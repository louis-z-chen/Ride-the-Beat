<?php
session_start();

$logged_in = false;
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
	$logged_in = true;
}
if($logged_in != true){
	header('Location: ../pages/login_signup.php');
	exit();
}

require "../reusable_code/curr_user_info.php";
?>
