<?php
require "../reusable_code/curr_user_info.php";
$curr_user_id = $curr_id;

//get variables from javascript
$playlist_id = isset($_POST['playlist_id']) ? trim($_POST['playlist_id']) : '';
$rater_id = isset($_POST['rater_id']) ? trim($_POST['rater_id']) : '';
$rating_id = isset($_POST['rating_id']) ? trim($_POST['rating_id']) : '';
$rating = isset($_POST['rating']) ? trim($_POST['rating']) : '';
$comment = isset($_POST['comment']) ? trim($_POST['comment']) : '';

$rate_success = false;
$ok = true;
$messages = array();

//check none Empty
if(!isset($rating) || empty($rating)){
    $ok = false;
    $messages[] = 'Rating cannot be empty!';
}

if(!isset($comment) || empty($comment)){
    $ok = false;
    $messages[] = 'Comment cannot be empty!';
}

//message too long
if (strlen($comment) > 500) {
  $ok = false;
  $messages[] = "Message was too long";
}

//database connection
require "../reusable_code/database_connection.php";

//if no errors then rate
if($ok){
  if(!isset($rating_id) || empty($rating_id)){  //if not rating before, exist insert statement

    $sql_insert = "INSERT INTO playlist_ratings (playlist_id, rater_id, rating, comment)
    VALUES (?,?,?,?);";

    $statement_insert = $mysqli->prepare($sql_insert);
    $statement_insert->bind_param("iiis", $playlist_id, $curr_user_id, $rating, $comment);
    $executed = $statement_insert->execute();

    if(!$executed) {
      echo $mysqli->error;
    }
    if( $statement_insert->affected_rows == 1 ) {
      $rate_success = true;
    }
    else{
      $ok = false;
      $messages[] = "Rating was not successfully added.";
    }
    $statement_insert->close();
  }
  else{ //rating already exists, so update statement
    $sql_update =
    "UPDATE playlist_ratings
    SET playlist_id = ?, rater_id = ?, rating = ?, comment = ?
    WHERE ID = ?;";

    $statement_update = $mysqli->prepare($sql_update);
    $statement_update->bind_param("iiisi", $playlist_id, $curr_user_id, $rating, $comment, $rating_id);
    $executed = $statement_update->execute();

    if(!$executed) {
      echo $mysqli->error;
    }

    if( $statement_update->affected_rows == 1 ) {
      $rate_success = True;
    }

    $statement_update->close();
  }
}

$mysqli->close();

echo json_encode(
  array(
    'rate_success' => $rate_success,
    'messages' => $messages
  )
);
?>
