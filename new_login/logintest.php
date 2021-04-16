<?php
session_start();

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
    // is already logged in
		header("Location: home.php");
    exit();
}

?>

<html>
<head>
  <link rel="stylesheet" href="login.css">
  <title>Ride the Beat</title>

  <?php require "../reusable_code/header_files.php"; ?>
</head>

<body>
<div class="container" id="container">
	<div class="form-container sign-up-container">
    <form method="POST" action="../backend/signup_confirmation.php" name="signupform">
      <h2>Sign up</h2>
      <br>
      <div class="form-group">
        <label for="first_name">First Name</label>
        <input type="text" class="form-control" name="first_name" value="<?php echo $_SESSION["signup_first_name"]; ?>" required>
      </div>
      <div class="form-group">
        <label for="last_name">Last Name</label>
        <input type="text" class="form-control" name="last_name" value="<?php echo $_SESSION["signup_last_name"]; ?>" required>
      </div>
      <div class="form-group">
        <label for="input_email">Email
          <font color="red"><i><?php echo $_SESSION["email_format_error"]; ?></i></font>
          <font color="red"><i><?php echo $_SESSION["email_exist_error"]; ?></i></font>
        </label>
        <input type="email" class="form-control" name="email" value="<?php echo $_SESSION["signup_email"]; ?>" required>
      </div>
      <div class="form-group">
        <label for="input_username">Username
          <font color="red"><i><?php echo $_SESSION["username_exist_error"]; ?></i></font>
        </label>
        <input type="text" class="form-control" name="username" value="<?php echo $_SESSION["signup_username"]; ?>" required>
      </div>
      <div class="form-group">
        <label for="input_password">Password
          <font color="red"><i><?php echo $_SESSION["password_mismatch_error"]; ?></i></font>
        </label>
        <input type="password" class="form-control" name="password" required>
      </div>
      <div class="form-group">
        <label for="input_password2">Confirm Password</label>
        <input type="password" class="form-control" name="password2" required>
      </div>
      <div>
        <font color="red"><i><?php echo $_SESSION["signup_error"]; ?></i></font>
      </div>
      <br>
      <div class="form-group">
          <button type="submit" class="btn btn-success" id="green-button">
            <i class="fas fa-user-plus"></i>
            Create Account
          </button>
      </div>
    </form>

		<!-- the original code

     <form action="#">
			<h1>Create Account</h1>
			<span>or use your email for registration</span>
			<input type="text" placeholder="Name" />
			<input type="email" placeholder="Email" />
			<input type="password" placeholder="Password" />
			<button>Sign Up</button>
		</form> -->

	</div>

	<div class="form-container sign-in-container">
    <form method="POST" action="../backend/login_confirmation.php" name="loginform">
      <h2>Login</h2>
      <br>
      <div class="form-group">
        <label for="username">Username
          <font color="red"><i><?php echo $_SESSION["username_not_exist_error"]; ?></i></font>
        </label>
        <input type="text" class="form-control" name="username" value="<?php echo $_SESSION["login_username"]; ?>" required>
      </div>
      <div class="form-group">
        <label for="password">Password
            <font color="red"><i><?php echo $_SESSION["incorrect_password_error"]; ?></i></font>
        </label>
        <input type="password" class="form-control" name="password" required>
      </div>
      <div>
        <font color="red"><i><?php echo $_SESSION["login_error"]; ?></i></font>
      </div>
      <br>
      <div class="form-group">
          <button type="submit" class="btn btn-success" id="green-button">
            <i class="fas fa-sign-in-alt"></i>
            Sign In
          </button>
      </div>

<!-- this is the other code
</form>
		<form action="#">
			<h1>Sign in</h1>
			<input type="email" placeholder="Email" />
			<input type="password" placeholder="Password" />
			<a href="#">Forgot your password?</a>
			<button>Sign In</button>
		</form>

-->

</div> <!--end of sign in-->

	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome!</h1>
				<p>Login to discover new music.</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Ride The Beat</h1>
				<p>Enter your details and start grooving with us.</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>

<script src="login.js"></script>

</body>
</html>
