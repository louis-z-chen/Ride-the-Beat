<?php

session_start();

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
require "database_connection.php";

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
  $mysqli->close();
}


//if account was created then log the user in, if not send back to sign up page with errors
if($createdUser == True){
  //log in
  //session_unset();

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
