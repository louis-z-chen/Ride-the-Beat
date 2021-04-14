<?php
session_start();

$light = $_POST["lightmode"];

if($light == "true") {
	$_SESSION["lightmode"] = true;
}
else {
	$_SESSION["lightmode"] = false;
}

?>
