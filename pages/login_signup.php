<?php
session_start();

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
    // is already logged in
		header("Location: home.php");
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>

	<title>Ride the Beat</title>
  <link rel="stylesheet" href="https://use.typekit.net/vps8gbz.css">
  <?php require "../reusable_code/header_files.php"; ?>
  <link rel="stylesheet" type="text/css" href="../stylesheets/login_signup.css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">

<style>
body {
  background: linear-gradient(-45deg, #1DB954, #121212, #121212);
  background-size: 400% 400%;
  animation: gradient 6s ease infinite;
}

@keyframes gradient {
   0% {
     background-position: 10% 50%;
   }
   50% {
     background-position: 65% 50%;
   }
   100% {
     background-position: 0% 50%;
   }
}

</style>
</head>

<body>
  <div class="cont">
    <div class="form sign-in">
      <h2>Sign In</h2>
      <br>
      <ul class="login-messages center" id="login_errors"></ul>
      <label>
        <span>Username</span>
        <input type="text" name="username" id="lusername">
      </label>
      <label>
        <span>Password</span>
        <input type="password" name="password" id="lpassword">
      </label>
			<button type="button" class="btn btn-success" id="login-btn">Sign In</button>
    </div>

    <div class="sub-cont">
      <div class="img">
        <div class="img-text m-up">
          <h2>New Here?</h2>
          <p>Sign up and discover new music from emerging artists and others</p>
        </div>
        <div class="img-text m-in">
          <h2>Welcome Back!</h2>
          <p>If you already have an account, just sign in. We've missed you!</p>
        </div>
        <div class="img-btn">
          <span class="m-up">Sign Up</span>
          <span class="m-in">Sign In</span>
        </div>
      </div>
      <div class="form sign-up">
        <h2>Sign Up</h2>
        <ul class="signup-messages center" id="add_errors"></ul>
        <div class="row">
          <div class="col">
            <label>
              <span>First Name</span>
              <input type="text" id="afirst">
            </label>
            <label>
              <span>Username</span>
              <input type="text" id="ausername">
            </label>
            <label>
              <span>Password</span>
              <input type="password" id="apassword">
            </label>
          </div>
          <div class="col">
            <label>
              <span>Last Name</span>
              <input type="text" id="alast">
            </label>
            <label>
              <span>Email</span>
              <input type="email" id="aemail">
            </label>
            <label>
              <span>Confirm Password</span>
              <input type="password" id="apassword2">
            </label>
          </div>
        </div>
        <div class="hidden">
          <input type="text" id="asecurity" value="1">
        </div>
				<button type="button" class="btn btn-success" id="add-btn" style="margin-top: 25px !important;">Sign Up</button>
      </div>
    </div>
  </div>

  <?php require "../reusable_code/footer_files.php"; ?>
  <script src = "../javascript_files/login_signup.js"></script>
</body>
</html>
