<?php
require "../reusable_code/curr_user_info.php";

$creator_id = $curr_id;
$image_url = isset($_POST['image_url']) ? trim($_POST['image_url']) : '';
$name = isset($_POST['name']) ? trim($_POST['name']) : '';
$public = (int)isset($_POST['public']) ? trim($_POST['public']) : '';
$url = isset($_POST['url']) ? trim($_POST['url']) : '';
$spotify_id = isset($_POST['spotify_id']) ? trim($_POST['spotify_id']) : '';

$add_success = false;
$ok = true;
$messages = array();

//check none Empty
if(!isset($image_url) || empty($image_url)){
    $ok = false;
    $messages[] = 'Image URL cannot be empty!';
}
if(!isset($name) || empty($name)){
    $ok = false;
    $messages[] = 'Name cannot be empty!';
}
if(!isset($public) || empty($public)){
    $ok = false;
    $messages[] = 'Public cannot be empty!';
}
if(!isset($url) || empty($url)){
    $ok = false;
    $messages[] = 'Playlist URL cannot be empty!';
}
if(!isset($spotify_id) || empty($spotify_id)){
    $ok = false;
    $messages[] = 'Spotify_id cannot be empty!';
}

//database connection
require "../reusable_code/database_connection.php";

//if no errors then create new playlist
if($ok){
  $sql_prepared = "INSERT INTO playlist (image_url, name, public, url, spotify_id, creator_id)
  VALUES (?,?,?,?,?,?);";

  $statement = $mysqli->prepare($sql_prepared);
  $statement->bind_param("ssisss", $image_url, $name, $public, $url, $spotify_id, $creator_id);
//  $executed = $statement->execute();

  if(!$executed) {
    echo $mysqli->error;
  }
  if( $statement->affected_rows == 1 ) {
    $add_success = true;
  }
  else{
    $ok = false;
    $messages[] = "Playlist was not successfully created.";
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
