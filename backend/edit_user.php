<?php
session_start();

$id = (int) trim($_POST['id']);
$first_name = isset($_POST['first_name']) ? trim($_POST['first_name']) : '';
$last_name = isset($_POST['last_name']) ? trim($_POST['last_name']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$username = isset($_POST['username']) ? trim($_POST['username']) : '';
$password = isset($_POST['password']) ? trim($_POST['password']) : '';
$security = (int) isset($_POST['security']) ? trim($_POST['security']) : '';

$edit_success = false;
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
if(!isset($security) || empty($security)){
    $ok = false;
    $messages[] = 'Security Level cannot be empty!';
}

//database connection
require "../reusable_code/database_connection.php";

$existing_first;
$existing_last;
$existing_email;
$existing_username;
$existing_password;
$existing_security_level;

//get existing username, email, and security level
$sql_prepared = "SELECT * FROM users WHERE ID = ?;";
$statement = $mysqli->prepare($sql_prepared);
$statement->bind_param("i", $id);
$executed = $statement->execute();

if(!$executed) {
  echo $mysqli->error;
}

$result = $statement->get_result();
$row = $result -> fetch_assoc();

$existing_first = $row["first_name"];
$existing_last = $row["last_name"];
$existing_email = $row["email"];
$existing_username = $row["username"];
$existing_password = $row["password_hash"];
$existing_security_level = $row["security_level"];

$statement->close();

//admin authorization
//only someone with a higher security level than the user account can make the change unless you are changing your own account
if($_SESSION["security_level"] <= $existing_security_level){
  if($_SESSION["id"] != $id){
    $messages[] = "You are not authorized to make changes to this user account";
    $ok = false;
  }
}

//check if any changes were made
$hash_pass = hash("md5", $password);

if($existing_first == $first_name){
  if($existing_last == $last_name){
    if($existing_email == $email){
      if($existing_username == $username){
        if($existing_password == $hash_pass){
          if($existing_security_level == $security){
            $messages[] = "No changes were made";
            $ok = false;
          }
        }
      }
    }
  }
}

//checking username and email
/*
There are two usernames
1.the original username for this user
2.the new username that the admin wants to change the username

if 1 and 2 are the same then its fine even though the username already exists in the database
if they are not the same, you have to check if 2 exists in the database

the same idea applies to emails
*/
if($ok){
  //if different, check if username and email already exists
  $error = false;
  if($existing_email != $email){
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
  }

  if($existing_username != $username){
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
  }

  if($error){
    $ok = false;
  }
}

//if no errors then update command
if($ok){
  $sql_update =
  "UPDATE users
  SET first_name = ?, last_name = ?, email = ?, security_level = ?, username = ?, password_hash = ?
  WHERE ID = ?;";

  $statement_update = $mysqli->prepare($sql_update);
  $statement_update->bind_param("sssissi", $first_name, $last_name, $email, $security, $username, $hash_pass, $id);
  $executed = $statement_update->execute();

  if(!$executed) {
    echo $mysqli->error;
  }

  if( $statement_update->affected_rows == 1 ) {
    $edit_success = True;
  }

  $statement_update->close();
}

$mysqli->close();

echo json_encode(
  array(
    'edit_success' => $edit_success,
    'messages' => $messages
  )
);
?>
