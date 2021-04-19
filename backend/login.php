<?php
session_start();
$user_id = $_REQUEST["logged_in_id"];

//log in
$_SESSION["loggedin"] = true;
$_SESSION["id"] = $user_id;

//header("Location: ../pages/home.php");
//exit();
echo json_encode(
  array(
    'login_success' => true
  )
);
?>
