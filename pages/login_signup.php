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

	<?php require "../reusable_code/header_files.php"; ?>

	<!--internal css for now until styles.css is finished -->
	<style>
	html, body{
		padding: 0;
		margin:0;
		height: 100%;
	}
	.main-body{
		width: 80%;
	}
	.center {
	  display: block;
	  margin-left: auto;
	  margin-right: auto;
	}
	.login_and_signup_container{
		display:flex;
		justify-content: space-between;
	}

	.login{
		width:48%
	}

	.signup{
		width:48%
	}

	#green-button{
		background-color: #1DB954;
		width: 100%;
	}

	.login-signup-main{
		background-color: #B3B3B3;
		padding-top: 50px;
	  padding-right: 20px;
	  padding-bottom: 50px;
	  padding-left: 20px;
		border-radius: 25px;
	}

	</style>

</head>
<body>
	<?php require "../reusable_code/menu.php"; ?>

  <div class = "main-body center login-signup-main">
		<div class="login_and_signup_container">

			<div class="login">
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

				</form>
			</div>

			<div class="signup">
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
			</div>


		</div>
	</div>

	<?php require "../reusable_code/footer_files.php"; ?>

</body>
</html>
