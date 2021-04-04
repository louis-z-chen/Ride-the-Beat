<?php
session_start();

$loggedin = false;
$login_attempt = false;
$correct_password = false;

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
    // Logged in
    $loggedin = true;
}
else if (!empty($_REQUEST["password"])) {
    $login_attempt = true;
    if($_REQUEST["password"]=="password") {
        // Not Logged in but has correct password
        $_SESSION["loggedin"]= true;
        $loggedin = true;
        $correct_password = true;
    }
    else {
        // Not Logged in and has wrong password
    }
}
else {
    // NOT logged in and has NOT submitted form/login
}
?>

<html>
<head>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display&display=swap" rel="stylesheet">
    <style>
        body{
            margin: 3%;
            background-color: #05386B;
            font-family: 'Poppins', sans-serif;
            text-align: center;
            font-size: 18px;
            background-size: cover;
        }
        #main{
            width: 400px;
            height: 350px;
            margin-left: auto;
            margin-right: auto;
            margin-top: 250px;
            padding: 40px 40px;
            background-color: white;
            text-align: center;
        }
    </style>
</head>

<body>
<div id="main">

    <h2>Log In Security Lab:</h2>

    <?php

    if(($correct_password == false) && ($login_attempt == true)){
        echo "<h3> Wrong Password! </h3>";
    }

    if($loggedin == true){
        include "logoutform.php";
    }
    else{
        include "loginform.php";
    }

    ?>
</div>

</body>
</html>