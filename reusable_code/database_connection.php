<?php
$host = "webdev.iyaclasses.com";
$user = "chenloui_guest";
$cpanelpassword = "ridethebeat!";
$db = "chenloui_ridethebeat";

// DB Connection
$mysqli = new mysqli($host, $user, $cpanelpassword, $db);
if ( $mysqli->connect_errno ) {
  echo $mysqli->connect_error;
  exit();
}
?>
