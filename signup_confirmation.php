<?php

session_start();

//if someone goes directly to this php get_included_file
if(empty($_REQUEST["first_name"]) || empty($_REQUEST["last_name"]) || empty($_REQUEST["email"]) || empty($_REQUEST["username"]) || empty($_REQUEST["password"]) || empty($_REQUEST["password2"])){
  header('Location: login_signup.php');
  exit();
}

//get sign up form responses
$first_name = $_REQUEST["first_name"];
$last_name = $_REQUEST["last_name"];
$email = $_REQUEST["email"];
$username = $_REQUEST["username"];
$password = $_REQUEST["password"];
$password2 = $_REQUEST["password2"];

//assume user did not turn off javascript so none of these should be empty because of the required tags

//declare error variables
$email_format_error = "";
$email_exist_error = "";
$username_exist_error = "";
$password_mismatch_error ="";
$signup_error = "";

//check if email is in the right format
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $email_format_error = "Invalid email format.";
}

//check if passwords are the same, if yes create hashed password
$hash_pass = "";
if ($password == $password2){
  $hash_pass = hash("md5", $password);
}
else{
  $password_mismatch_error = "Password and Confirm password need to match.";
}

//database connection
require "reusable_code/database_connection.php";

//check if email exists in database_connection
$sql_email = "SELECT * FROM users where email = ?";
$statement_email = $mysqli->prepare($sql_email);
$statement_email->bind_param('s',$email);
$executed = $statement_email->execute();

if(!$executed) {
  echo $mysqli->error;
}

$result = $statement_email->get_result();
$row = $result -> fetch_assoc();

if($result->num_rows > 0) {
  $email_exist_error = "There is already an account associated with this email.";
}

$statement_email->close();

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

if($result->num_rows > 0) {
  $username_exist_error = "There is already an account associated with this username.";
}

$statement_username->close();

//if no errors, create new user
$createdUser = False;
$securitylevel = 1;
if(empty($email_format_error) && empty($email_exist_error) && empty($username_exist_error) && empty($password_mismatch_error)){
  $sql_prepared = "INSERT INTO users (first_name, last_name, email, security_level, username, password_hash)
  VALUES (?,?,?,?,?,?);";

  $statement = $mysqli->prepare($sql_prepared);
  $statement->bind_param("sssiss", $first_name, $last_name, $email, $securitylevel, $username, $hash_pass);
  $executed = $statement->execute();

  if(!$executed) {
    echo $mysqli->error;
  }
  if( $statement->affected_rows == 1 ) {
    $createdUser = True;
  }
  else{
    $signup_error = "Account was not successfully created.";
  }
  $statement->close();
}

//check if account is in database
$account_exist = False;
if(empty($signup_error)){
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
      $account_exist = True;
  }

  $statement->close();
}
$mysqli->close();


//if account was created then log the user in, if not send back to sign up page with errors
if($createdUser == True){
  session_unset();

  //log in
  $_SESSION["loggedin"] = true;
  $_SESSION["id"] = $row["id"];
  $_SESSION["first_name"] = $row["first_name"];
  $_SESSION["last_name"] = $row["last_name"];
  $_SESSION["email"] = $row["email"];
  $_SESSION["security_level"] = $row["security_level"];
  $_SESSION["username"] = $row["username"];

  header("Location: home.php");
  exit();
}

else{
  //entered VALUES
  $_SESSION["signup_first_name"] = $first_name;
  $_SESSION["signup_last_name"] = $last_name;
  $_SESSION["signup_email"] = $email;
  $_SESSION["signup_username"] = $username;

  //errors
  $_SESSION["email_format_error"] = $email_format_error;
  $_SESSION["email_exist_error"] = $email_exist_error;
  $_SESSION["username_exist_error"] = $username_exist_error;
  $_SESSION["password_mismatch_error"] = $password_mismatch_error;
  $_SESSION["signup_error"] = $signup_error;

  header("Location: login_signup.php");
  exit();

}

?>
