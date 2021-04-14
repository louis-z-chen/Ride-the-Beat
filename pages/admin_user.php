<?php
require "../reusable_code/login_logic.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Ride the Beat</title>

	<?php require "../reusable_code/header_files.php"; ?>

</head>
<body>
	<?php require "../reusable_code/menu.php"; ?>

  <div class = "main-body center">
    <div class="column">
      <di class="column-content">

				<h1 class="white-text">User Accounts</h1>
				<button class="btn btn-success green-btn">Add User Account</button>
				<br>
				<br>

				<table class="table table-dark">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Name</th>
				      <th scope="col">Username</th>
							<th scope="col">Email</th>
							<th scope="col">Security Level</th>
							<th scope="col">Options</th>
				    </tr>
				  </thead>
				  <tbody>
				    <tr>
				      <th scope="row">1</th>
				      <td>Mark Smith</td>
				      <td>@mdo</td>
							<td>louischen20@gmail.com</td>
							<td>@mdo</td>
							<td>
								<button class="btn btn-outline-success">Edit</button>
								<button class="btn btn-outline-success">Delete</button>
							</td>
				    </tr>
				    <tr>
				      <th scope="row">2</th>
							<td>Mark Smith</td>
				      <td>@mdo</td>
							<td>louischen20@gmail.com</td>
							<td>@mdo</td>
							<td>
								<button class="btn btn-success green-btn">Edit</button>
								<button class="btn btn-success green-btn">Delete</button>
							</td>
				    </tr>
				    <tr>
				      <th scope="row">3</th>
							<td>Mark Smith</td>
				      <td>@mdo</td>
							<td>louischen20@gmail.com</td>
							<td>@mdo</td>
							<td>
								<button class="btn btn-success green-btn">Edit</button>
								<button class="btn btn-success green-btn">Delete</button>
							</td>
				    </tr>
				  </tbody>
				</table>



      </div>
    </div>
	</div>

	<?php require "../reusable_code/footer_files.php"; ?>
	<?php require "../reusable_code/lightmode_files.php"; ?>

</body>
</html>
