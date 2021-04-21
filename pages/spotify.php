<?php
require "../reusable_code/login_logic.php";

$code = isset($_REQUEST['code']) ? trim($_REQUEST['code']) : 'no code';
$error = isset($_REQUEST['error']) ? trim($_REQUEST['error']) : 'no error';

//if previous user and already connected spotify before then refresh tokens
$message = "new user";
if(!empty($curr_access)){
  $message = "existing user";
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Ride the Beat</title>

	<?php require "../reusable_code/header_files.php"; ?>

  <style>
  div {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;
    width: 100%;
  }
  </style>

</head>
<body>

	<div class="white-text">
      <span>
        <h1>Connecting to Spotify...</h1>
      </span>
  </div>

  <div id="code" class="hidden">
    <?php echo $code; ?>
  </div>

  <div id="error" class="hidden">
    <?php echo $error; ?>
  </div>

  <div id="message" class="hidden">
    <?php echo $message; ?>
  </div>

	<?php require "../reusable_code/footer_files.php"; ?>
  <script src = "../javascript_files/spotify_connect.js"></script>

</body>
</html>
