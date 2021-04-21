<?php
require "../reusable_code/curr_user_info.php";
$id = (int)$curr_id;

$s_access = isset($_POST['access']) ? trim($_POST['access']) : '';

$add_success = false;
$ok = true;
$messages = array();

//check none Empty
if(!isset($s_access) || empty($s_access)){
    $ok = false;
    $messages[] = 'Access cannot be empty!';
}

//database connection
require "../reusable_code/database_connection.php";

//if no errors then create new user
if($ok){
  $sql_update =
  "UPDATE users
  SET spotify_access = ?
  WHERE ID = ?;";

  $statement_update = $mysqli->prepare($sql_update);
  $statement_update->bind_param("si", $s_access, $id);
  $executed = $statement_update->execute();

  if(!$executed) {
    echo $mysqli->error;
  }

  if( $statement_update->affected_rows == 1 ) {
    $add_success = True;
  }

  $statement_update->close();
}

$mysqli->close();

echo json_encode(
  array(
    'add_success' => $add_success,
    'messages' => $messages
  )
);
?>
