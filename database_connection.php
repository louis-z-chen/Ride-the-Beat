<?php
$host = "webdev.iyaclasses.com";
$userid = "chenloui_guest";
$userpw = "ridethebeat!";
$db = "chenloui_ridethebeat";

$mysql = new mysqli(
    $host,
    $userid,
    $userpw,
    $db
);

if($mysql->connect_errno) {
    echo "db connection error : " . $mysql->connect_error;
    exit();
}
else {
    echo "";
}
?>
