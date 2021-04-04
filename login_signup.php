<?php
session_start();

print_r($_SESSION);
/*
$loggedin = false;
$login_attempt = false;
$correct_password = false;

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
    // Logged in
    $loggedin = true;
}
else if (!empty($_REQUEST["password"])) {
    $login_attempt = true;
    if($_REQUEST["password"]=="password") {
        // Not Logged in but has correct password
        $_SESSION["loggedin"]= true;
        $loggedin = true;
        $correct_password = true;
    }
    else {
        // Not Logged in and has wrong password
    }
}
else {
    // NOT logged in and has NOT submitted form/login
}
*/
?>

<!DOCTYPE html>
<html>
<head>
	<title>Ride the Beat</title>

	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/aef7737b1c.js" crossorigin="anonymous"></script>
	<link href= "styles.css" rel="stylesheet">

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

	</style>

</head>
<body>
	<?php require "menu.php"; ?>

  <div class = "main-body center">
		<div class="login_and_signup_container">

			<div class="login">
				<form method="post" action="" name="loginform">
					<h2>Login</h2>
					<br>
					<div class="form-group">
						<label for="login_username">Username</label>
						<input type="text" class="form-control" name="login_username" required>
					</div>
					<div class="form-group">
						<label for="login_password">Password</label>
						<input type="password" class="form-control" name="login_password" required>
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
				<form method="POST" action="signup_confirmation.php" name="signupform">
					<h2>Sign up</h2>
					<br>
					<div class="form-group">
						<label for="first_name">First Name</label>
						<input type="text" class="form-control" name="first_name" required>
					</div>
					<div class="form-group">
						<label for="last_name">Last Name</label>
						<input type="text" class="form-control" name="last_name" required>
					</div>
					<div class="form-group">
						<label for="input_email">Email
							<font color="red"><i><?php echo $_SESSION["$email_format_error"]; ?></i></font>
							<font color="red"><i><?php echo $_SESSION["$email_exist_error"]; ?></i></font>
						</label>
						<input type="email" class="form-control" name="email" required>
					</div>
					<div class="form-group">
						<label for="input_username">Username
							<font color="red"><i><?php echo $_SESSION["$username_exist_error"]; ?></i></font>
						</label>
						<input type="text" class="form-control" name="username" required>
					</div>
					<div class="form-group">
						<label for="input_password">Password
							<font color="red"><i><?php echo $_SESSION["$password_mismatch_error"]; ?></i></font>
						</label>
						<input type="password" class="form-control" name="password" required>
					</div>
					<div class="form-group">
						<label for="input_password2">Confirm Password</label>
						<input type="password" class="form-control" name="password2" required>
					</div>
					<div>
						<font color="red"><i><?php echo $_SESSION["$signup_error"]; ?></i></font>
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



	<!-- Required meta tags -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
