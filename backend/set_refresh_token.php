<?php
require "../reusable_code/curr_user_info.php";
$id = (int)$curr_id;

$s_refresh = isset($_POST['refresh']) ? trim($_POST['refresh']) : '';

$add_success = false;
$ok = true;
$messages = array();

//check none Empty
if(!isset($s_refresh) || empty($s_refresh)){
    $ok = false;
    $messages[] = 'Refresh cannot be empty!';
}

//database connection
require "../reusable_code/database_connection.php";

//if no errors then create new user
if($ok){
  $sql_update =
  "UPDATE users
  SET spotify_refresh = ?
  WHERE ID = ?;";

  $statement_update = $mysqli->prepare($sql_update);
  $statement_update->bind_param("si", $s_refresh, $id);
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
