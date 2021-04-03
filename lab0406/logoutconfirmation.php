<?php

// logout routine
session_start();
unset($_SESSION["loggedin"]);
session_destroy();

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

    <h3>Logged Out!</h3>

    You are now logged out
    If you would like to log back in, please visit the <a href='login.php'>Log In</a> page.
</div>

</body>
</html>