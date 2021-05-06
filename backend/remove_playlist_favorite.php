<?php
$fav_id = isset($_POST['fav_id']) ? trim($_POST['fav_id']) : '';

$delete_success = false;
$ok = true;
$messages = array();

//database connection
require "../reusable_code/database_connection.php";

//check none Empty
if(!isset($fav_id) || empty($fav_id)){
    $ok = false;
    $messages[] = 'Favorites ID cannot be empty!';
}

//if no errors then delete
if($ok){
  $sql_delete =
  "DELETE FROM playlist_favorites
  WHERE id = ?;";

  $statement_delete = $mysqli->prepare($sql_delete);
  $statement_delete->bind_param("i", $fav_id);
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
    'messages' => $messages
  )
);
?>
