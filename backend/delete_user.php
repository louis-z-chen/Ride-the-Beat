<?php
require "../reusable_code/curr_user_info.php";

$id = (int) trim($_POST['id']);

$delete_success = false;
$ok = true;
$self = false;
$messages = array();

//database connection
require "../reusable_code/database_connection.php";

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

$existing_security_level = $row["security_level"];

$statement->close();

//admin authorization
//only someone with a higher security level than the user account can make the change
if($curr_security_level <= $existing_security_level){
  if($curr_id != $id){
    $messages[] = "You are not authorized to delete this user account";
    $ok = false;
  }
}

//if deleting own account, then delete session and redirect to welcome
if($curr_id == $id){
  $self = true;
}

//if no errors then delete
if($ok){
  $sql_delete =
  "DELETE FROM users
  WHERE ID = ?;";

  $statement_delete = $mysqli->prepare($sql_delete);
  $statement_delete->bind_param("i", $id);
  $executed = $statement_delete->execute();

  if(!$executed) {
    echo $mysqli->error;
  }

  if( $statement_delete->affected_rows == 1 ) {
    $delete_success = True;
  }

  $statement_delete->close();
}

$mysqli->close();

echo json_encode(
  array(
    'delete_success' => $delete_success,
    'self' => $self,
    'messages' => $messages
  )
);
?>
