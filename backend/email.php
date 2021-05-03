<?php
require "../reusable_code/curr_user_info.php";

$from_email = $curr_email;
$to_email = isset($_POST['email']) ? trim($_POST['email']) : '';
$message = isset($_POST['message']) ? trim($_POST['message']) : '';

$send_success = false;
$ok = true;
$messages = array();

//check none Empty
if(!isset($to_email) || empty($to_email)){
    $ok = false;
    $messages[] = 'Email cannot be empty!';
}

//email not formatted
if($ok){
  if (!filter_var($to_email, FILTER_VALIDATE_EMAIL)) {
    $ok = false;
    $messages[] = "Invalid Email format.";
  }
}

//message too long
if (strlen($message) > 70) {
  $ok = false;
  $messages[] = "Message was too long";
}

//if no errors then email
if($ok){

  $message = $message;
  $message .= "\r\n";
  $message = str_replace("\n.", "\n..", $message);

  $to = $to_email;
  $subject = "Your Friend Sent a Playlist Recommendation";
  $from = $from_email;
  $headers = "From: $from";
  $test = mail($to,$subject,$message,$headers);

  if ($test==1) {
    $send_success = true;
  }
  else{
    $ok = false;
    $messages[] = 'Email was not sent successfully';
  }

}

$mysqli->close();

echo json_encode(
  array(
    'send_success' => $send_success,
    'messages' => $messages
  )
);
?>
