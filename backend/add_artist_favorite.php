<?php
$user_id = isset($_POST['user_id']) ? trim($_POST['user_id']) : '';
$artist_id = isset($_POST['artist_id']) ? trim($_POST['artist_id']) : '';

$add_success = false;
$ok = true;
$messages = array();

//check none Empty
if(!isset($user_id) || empty($user_id)){
    $ok = false;
    $messages[] = 'User ID cannot be empty!';
}
if(!isset($artist_id) || empty($artist_id)){
    $ok = false;
    $messages[] = 'Artist ID cannot be empty!';
}

//database connection
require "../reusable_code/database_connection.php";

//if no errors then create new user
if($ok){
  $sql_prepared = "INSERT INTO artist_favorites (user_id, artist_id)
  VALUES (?,?);";

  $statement = $mysqli->prepare($sql_prepared);
  $statement->bind_param("ii", $user_id, $artist_id);
  $executed = $statement->execute();

  if(!$executed) {
    echo $mysqli->error;
  }

  if( $statement->affected_rows == 1 ) {
    $add_success = true;
  }
  else{
    $ok = false;
    $messages[] = "Favorite was not successfully added.";
  }
  $statement->close();
}
$mysqli->close();

echo json_encode(
  array(
    'add_success' => $add_success,
    'messages' => $messages
  )
);
?>
