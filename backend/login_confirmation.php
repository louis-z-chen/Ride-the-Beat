<?php
$username = isset($_POST['username']) ? trim($_POST['username']) : '';
$password = isset($_POST['password']) ? trim($_POST['password']) : '';

$login_valid = false;
$ok = true;
$messages = array();

//check none Empty
if(!isset($username) || empty($username)){
  $ok = false;
  $messages[] = 'Username cannot be empty!';
}
if(!isset($password) || empty($password)){
  $ok = false;
  $messages[] = 'Password cannot be empty!';
}

$hash_pass = hash("md5", $password);

//database connection
require "../reusable_code/database_connection.php";

//check if username exists in database_connection
if($ok){
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
    $ok = false;
    $messages[] = 'Username does not exist!';
  }
  $statement_username->close();
}

//check if password is correct
if($ok){
  $correct_hash_pass = $row["password_hash"];
  if($hash_pass != $correct_hash_pass){
    $messages[] = "Password is incorrect";
  }
}

// double check credentials and get user id
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
    $login_valid = True;
}

$statement->close();

//get user id
$user_id = $row["ID"];

$mysqli->close();

echo json_encode(
  array(
    'login_valid' => $login_valid,
    'user_id' => $user_id,
    'messages' => $messages
  )
);
?>
