<?php

session_start();

//if someone goes directly to this php get_included_file
if(empty($_REQUEST["username"]) || empty($_REQUEST["password"])){
  header('Location: ../pages/login_signup.php');
  exit();
}

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
require "../reusable_code/database_connection.php";

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

//check if password is correct
$correct_hash_pass = $row["password_hash"];
if($hash_pass != $correct_hash_pass){
  $incorrect_password_error = "Password is incorrect";
}

if(!empty($username_not_exist_error) && !empty($incorrect_password_error)){
    $username_not_exist_error = "";
    $incorrect_password_error = "";
    $login_error = "Username and Password are incorrect";
}

// double check credentials
$correct_cred = False;
if(empty($username_not_exist_error) && empty($incorrect_password_error) && empty($login_error)){
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
      $correct_cred = True;
  }

  $statement->close();
}
$mysqli->close();

//credentials are correct
if($correct_cred == True){
    session_unset();

    //log in
    $_SESSION["loggedin"] = true;
		$_SESSION["id"] = $row["id"];
    $_SESSION["first_name"] = $row["first_name"];
    $_SESSION["last_name"] = $row["last_name"];
    $_SESSION["email"] = $row["email"];
    $_SESSION["security_level"] = $row["security_level"];
		$_SESSION["username"] = $row["username"];

    header("Location: ../pages/home.php");
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
    header("Location: ../pages/login_signup.php");
    exit();

}

?>
