<?php

session_start();

//get sign up form responses
$username = $_REQUEST["username"];
$password = $_REQUEST["password"];
$hash_pass = hash("md5", $password);

//assume user did not turn off javascript so none of these should be empty because of the required tags

//declare error variables
$username_not_exist_error = "";
$incorrect_password_error = "";
$login_error = "";

//database connection
require "database_connection.php";

//check if username exists in database_connection
$sql_username = "SELECT * FROM users where username = ?";
$statement_username = $mysqli->prepare($sql_username);
$statement_username->bind_param('s',$username);
$executed = $statement_username->execute();

if(!$executed) {
    echo $mysqli->error;
}

$result = $statement_username->get_result();
$row = $result -> fetch_assoc();

if($result->num_rows == 0) {
    $username_not_exist_error = "Username does not exist.";
}

$statement_username->close();

//validate
$cred_exists = False;
$sql_prepared = "SELECT * FROM users WHERE username = ? AND password_hash = ?;";
$statement = $mysqli->prepare($sql_prepared);
$statement->bind_param("ss", $username, $hash_pass);
$executed = $statement->execute();

if(!$executed) {
    echo $mysqli->error;
}

$result = $statement->get_result();
$row = $result -> fetch_assoc();

if($result->num_rows == 1) {
    $cred_exists = True;
}

$statement->close();
$mysqli->close();

//if username exists but credentials are wrong then the password must be wrong
if(empty($username_not_exist_error) && ($cred_exists == FALSE)){
    $incorrect_password_error = "Password is incorrect";
}

if(!empty($username_not_exist_error) && !empty($incorrect_password_error)){
    $username_not_exist_error = "";
    $incorrect_password_error = "";
    $login_error = "Username and Password are incorrect";
}

$correct_cred = False;
if(empty($username_not_exist_error) && empty($incorrect_password_error) && empty($login_error) && $cred_exists){
    $correct_cred = True;
}


//credentials are correct
if($createdUser == True){
    //log in
    //session_unset();

    header("Location: home.php");
    exit();
}
else{
    //entered VALUES
    $_SESSION["login_username"] = $username;

    //errors
    $_SESSION["username_not_exist_error"] = $username_not_exist_error;
    $_SESSION["incorrect_password_error"] = $incorrect_password_error;
    $_SESSION["login_error"] = $login_error;

    //print_r($_SESSION);
    header("Location: login_signup.php");
    exit();

}

?>
