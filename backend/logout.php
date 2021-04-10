<?php

// logout routine
session_start();
unset($_SESSION["loggedin"]);
session_destroy();

header('Location: ../pages/welcome.php');

?>
