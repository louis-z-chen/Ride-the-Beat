<?php
	session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Stock Watch</title>

	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href= "styles.css" rel="stylesheet">

</head>
<body>
	<?php require "menu.php"; ?>

  <div class = "main-body center">
		<div class="login">
			<div class="login1">
				<form method="GET" action="LoginServlet" name="loginform">
					<h2>Login</h2>
					<br>
					<div class="form-group">
						<label for="login_username">Username <font color="red"><i><%= login_username_error %></i></font>
						<font color="red"><i><%= username_exist_error %></i></font></label>
						<input type="text" class="form-control" name="login_username" value="<%=login_username%>">
					</div>
					<div class="form-group">
						<label for="login_password">Password <font color="red"><i><%= login_password_error %></i></font></label>
						<input type="password" class="form-control" name="login_password">
					</div>
					<div>
						<font color="red"><i><%= login_error %></i></font>
					</div>
					<br>
					<div class="form-group">
					  	<button type="submit" class="btn btn-danger" id="red-button">
					  		<i class="fas fa-sign-in-alt"></i>
					  		Sign In
					  	</button>
					</div>
					<hr width=50%>
					<div class="form-group">
						<div id=errormessage></div>
						<div id="my-signin2"></div>
<!-- 				  		<button type="button" class="btn btn-primary" id = "blue-btn" name="map_btn">
				  			<i class="fab fa-google"></i>
				  			Sign In with Google
				  		</button> -->
				  	</div>
				</form>
			</div>

			<div class="login2">
				<form method="GET" action="SignUpServlet" name="signupform">
					<h2>Sign up</h2>
					<br>
					<div class="form-group">
						<label for="input_email">Email <font color="red"><i><%= email_error %></i></font>
						<font color="red"><i><%= emaildata_error %></i></font>
						<font color="red"><i><%= email_exist_error %></i></font></label>
						<input type="email" class="form-control" name="input_email" value="<%=email%>" required>
					</div>
					<div class="form-group">
						<label for="input_username">Username <font color="red"><i><%= username_error %></i></font>
						<font color="red"><i><%= username_exist_error2 %></i></font></label>
						<input type="text" class="form-control" name="input_username" value="<%=username%>" required>
					</div>
					<div class="form-group">
						<label for="input_password">Password <font color="red"><i><%= password_error %></i></font><font color="red"><i><%=  password_mismatch_error %></i></font></label>
						<input type="password" class="form-control" name="input_password" required>
					</div>
					<div class="form-group">
						<label for="input_password2">Confirm Password <font color="red"><i><%= password2_error %></i></font><font color="red"><i><%= password_mismatch_error %></i></font></label>
						<input type="password" class="form-control" name="input_password2" required>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="checkbox" value="checked" id="terms" required>
						<label for="terms" class=form-check-label">
							I have read and agreed to all terms and conditions of SalEats
						</label>
					</div>
					<div class="form-group">
					  	<button type="submit" class="btn btn-danger" id="red-button">
					  		<i class="fas fa-user-plus"></i>
					  		Create Account
					  	</button>
					</div>
				</form>
			</div>
		</div>
	</div>




	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</body>
</html>
