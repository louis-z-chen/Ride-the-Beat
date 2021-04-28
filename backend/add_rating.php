<?php
require "../reusable_code/curr_user_info.php";

$creator_id = $curr_id;
$image_url = isset($_POST['rater_first_name']) ? trim($_POST['rater_first_name']) : '';
$name = isset($_POST['rater_last_name']) ? trim($_POST['rater_last_name']) : '';
$public = (int)isset($_POST['rater_username']) ? trim($_POST['rater_username']) : '';
$url = isset($_POST['playlist_name']) ? trim($_POST['playlist_name']) : '';
$spotify_id = isset($_POST['comment']) ? trim($_POST['comment']) : '';

$add_success = false;
$ok = true;
$messages = array();

//check none Empty
if(!isset($rater_first_name) || empty($rater_first_name)){
    $ok = false;
    $messages[] = 'First name cannot be empty!';
}
if(!isset($rater_last_name) || empty($rater_last_name)){
    $ok = false;
    $messages[] = 'Last name cannot be empty!';
}
if(!isset($rater_username) || empty($rater_username)){
    $ok = false;
    $messages[] = 'Username cannot be empty!';
}
if(!isset($playlist_name) || empty($playlist_name)){
    $ok = false;
    $messages[] = 'Playlist name cannot be empty!';
}
if(!isset($comment) || empty($comment)){
    $ok = false;
    $messages[] = 'Comment cannot be empty!';
}

//database connection
require "../reusable_code/database_connection.php";

//if no errors then create new playlist
if($ok){
  $sql_prepared = "INSERT INTO playlist (image_url, name, public, url, spotify_id, creator_id)
  VALUES (?,?,?,?,?,?);";

  $statement = $mysqli->prepare($sql_prepared);
  $statement->bind_param("ssisss", $image_url, $name, $public, $url, $spotify_id, $creator_id);
  $executed = $statement->execute();

  if(!$executed) {
    echo $mysqli->error;
  }
  if( $statement->affected_rows == 1 ) {
    $add_success = true;
  }
  else{
    $ok = false;
    $messages[] = "Rating was not successfully created.";
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
