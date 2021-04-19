<?php
$first_name = isset($_POST['first_name']) ? trim($_POST['first_name']) : '';
$last_name = isset($_POST['last_name']) ? trim($_POST['last_name']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$username = isset($_POST['username']) ? trim($_POST['username']) : '';
$password = isset($_POST['password']) ? trim($_POST['password']) : '';
$password2 = isset($_POST['password2']) ? trim($_POST['password2']) : '';
$security = (int) isset($_POST['security']) ? trim($_POST['security']) : '';

$add_success = false;
$ok = true;
$messages = array();

//check none Empty
if(!isset($first_name) || empty($first_name)){
    $ok = false;
    $messages[] = 'First Name cannot be empty!';
}
if(!isset($last_name) || empty($last_name)){
    $ok = false;
    $messages[] = 'Last Name cannot be empty!';
}
if(!isset($email) || empty($email)){
    $ok = false;
    $messages[] = 'Email cannot be empty!';
}
if(!isset($username) || empty($username)){
    $ok = false;
    $messages[] = 'Username cannot be empty!';
}
if(!isset($password) || empty($password)){
    $ok = false;
    $messages[] = 'Password cannot be empty!';
}
if(!isset($password2) || empty($password2)){
    $ok = false;
    $messages[] = 'Confirm Password cannot be empty!';
}
if(!isset($security) || empty($security)){
    $ok = false;
    $messages[] = 'Security Level cannot be empty!';
}

if($ok){
  //check if email is in the right format
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $ok = false;
    $messages[] = "Invalid email format.";
  }

  //check if passwords are the same, if yes create hashed password
  $hash_pass = "";
  if ($password == $password2){
    $hash_pass = hash("md5", $password);
  }
  else{
    $ok = false;
    $messages[] = "Password and Confirm password need to match.";
  }
}

//database connection
require "../reusable_code/database_connection.php";

//checking username and email
if($ok){
  $error = false;
  //check if email exists in database_connection
  $sql_email = "SELECT * FROM users where email = ?";
  $statement_email = $mysqli->prepare($sql_email);
  $statement_email->bind_param('s',$email);
  $executed = $statement_email->execute();

  if(!$executed) {
    echo $mysqli->error;
  }

  $result_email = $statement_email->get_result();

  if($result_email->num_rows > 0) {
    $messages[] = 'There is already an account associated with this email';
    $error = true;
  }

  $statement_email->close();

  //check if username exists in database
  $sql_username = "SELECT * FROM users where username = ?";
  $statement_username = $mysqli->prepare($sql_username);
  $statement_username->bind_param('s',$username);
  $executed = $statement_username->execute();

  if(!$executed) {
    echo $mysqli->error;
  }

  $result = $statement_username->get_result();

  if($result->num_rows > 0) {
    $messages[] = "There is already an account associated with this username.";
    $error = true;
  }

  $statement_username->close();

  if($error){
    $ok = false;
  }
}

//if no errors then create new user
if($ok){
  $sql_prepared = "INSERT INTO users (first_name, last_name, email, security_level, username, password_hash)
  VALUES (?,?,?,?,?,?);";

  $statement = $mysqli->prepare($sql_prepared);
  $statement->bind_param("sssiss", $first_name, $last_name, $email, $security, $username, $hash_pass);
  $executed = $statement->execute();

  if(!$executed) {
    echo $mysqli->error;
  }
  if( $statement->affected_rows == 1 ) {
    $add_success = true;
  }
  else{
    $ok = false;
    $messages[] = "Account was not successfully created.";
  }
  $statement->close();
}

//get new user id
$new_user_id;
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
  $new_user_id = $row["ID"];

  $statement->close();
}
$mysqli->close();

echo json_encode(
  array(
    'add_success' => $add_success,
    'new_user_id' => $new_user_id,
    'messages' => $messages
  )
);
?>
