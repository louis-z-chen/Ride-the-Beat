<?php
require "../reusable_code/login_logic.php";

// if not an admin
if($_SESSION["security_level"] > 2){
  header('Location: ../pages/home.php');
  exit();
}

//database connection
require "../reusable_code/database_connection.php";

//search
//declare variables
$first_name = "";
$last_name = "";
$username = "%%";
$email = "";
$security_level = "";

//set variables
if(isset($_REQUEST["first_name"]) && $_REQUEST["first_name"]!=""){
	$first_name = $_REQUEST["first_name"];
}
if(isset($_REQUEST["last_name"]) && $_REQUEST["last_name"]!=""){
	$last_name = $_REQUEST["last_name"];
}
if(isset($_REQUEST["username"]) && $_REQUEST["username"]!=""){
	$username = "%"+$_REQUEST["username"]+"%";
	echo $username;
	echo "fuck";
}
if(isset($_REQUEST["email"]) && $_REQUEST["email"]!=""){
	$email = $_REQUEST["email"];
}
if(isset($_REQUEST["security_level"]) && $_REQUEST["security_level"]!=""){
	$security_level = $_REQUEST["security_level"];
}

//search prepared statement
$sql_search = "SELECT * FROM users WHERE username LIKE ? ORDER BY username;";
$statement_search = $mysqli->prepare($sql_search);
$statement_search->bind_param('s',$username);
$executed_search = $statement_search->execute();

if(!$executed_search) {
    echo $mysqli->error;
}

$results = $statement_search->get_result();
$user_count = $results->num_rows;
echo $user_count;

$statement_search->close();

//close sqli
$mysqli->close();
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

				<div class="search white-text">
					<h2>Find Users</h2>
					<form method="POST" action="admin_user.php">
						<div class="row">
							<div class="col-sm-2">
								<div class="form-group">
									<label>First Name</label>
									<input type="text" name="first_name" class="form-control" value="<?php echo isset($_REQUEST['first_name'])?$_REQUEST['first_name']:''?>" placeholder="Enter first name">
								</div>
							</div>
							<div class="col-sm-2">
								<div class="form-group">
									<label>Last Name</label>
									<input type="text" name="last_name" class="form-control" value="<?php echo isset($_REQUEST['last_name'])?$_REQUEST['last_name']:''?>" placeholder="Enter last name">
								</div>
							</div>
							<div class="col-sm-2">
								<div class="form-group">
									<label>Username</label>
									<input type="text" name="username" class="form-control" value="<?php echo isset($_REQUEST['username'])?$_REQUEST['username']:''?>" placeholder="Enter username">
								</div>
							</div>
							<div class="col-sm-2">
								<div class="form-group">
									<label>Email</label>
									<input type="text" name="email" class="form-control" value="<?php echo isset($_REQUEST['email'])?$_REQUEST['email']:''?>" placeholder="Enter email">
								</div>
							</div>
							<div class="col-sm-2">
								<div class="form-group">
									<label>Security Level</label>
									<input type="text" name="security_level" class="form-control" value="<?php echo isset($_REQUEST['security_level'])?$_REQUEST['security_level']:''?>" placeholder="Enter security level">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<div>
										<button type="submit" name="submit" value="search" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-search"></i> Search</button>
										<a href="<?php echo $_SERVER['PHP_SELF'];?>" class="btn btn-danger"><i class="fa fa-fw fa-sync"></i> Clear</a>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>

				<br />

				<div class="row">
					<div class="col-6">
						<h2 class="white-text">Manage Accounts</h2>
					</div>
					<div class="col-6" align="right">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="fas fa-user-plus"></i> <span> Add New User</span></a>
					</div>
				</div>

				<table class="table table-dark table-hover">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Name</th>
				      <th scope="col">Username</th>
							<th scope="col">Email</th>
							<th scope="col">Security Level</th>
							<th scope="col" class="text-center">Action</th>
				    </tr>
				  </thead>
				  <tbody>
						<tr>
				      <th scope="row">1</th>
							<td>Mark Smith</td>
				      <td>@mdo</td>
							<td>louischen20@gmail.com</td>
							<td>@mdo</td>
							<td align="center">
								<a href="" class="text-warning"><i class="far fa-edit"></i> Edit</a> |
								<a href="" class="text-danger"><i class="far fa-trash-alt"></i> Delete</a>
							</td>
				    </tr>
				    <tr>
				      <th scope="row">2</th>
							<td>Mark Smith</td>
				      <td>@mdo</td>
							<td>louischen20@gmail.com</td>
							<td>@mdo</td>
							<td align="center">
								<a href="" class="text-warning"><i class="far fa-edit"></i> Edit</a> |
								<a href="" class="text-danger"><i class="far fa-trash-alt"></i> Delete</a>
							</td>
				    </tr>
						<tr>
				      <th scope="row">3</th>
							<td>Mark Smith</td>
				      <td>@mdo</td>
							<td>louischen20@gmail.com</td>
							<td>@mdo</td>
							<td align="center">
								<a href="" class="text-warning"><i class="far fa-edit"></i> Edit</a> |
								<a href="" class="text-danger"><i class="far fa-trash-alt"></i>< Delete</a>
							</td>
				    </tr>
						<?php $counter = 1;?>
						<?php while($row = $results->fetch_assoc()) : ?>
							<tr>
							<th scope="row"><?php echo $counter ?></th>
							<?php $counter++;?>
							<td><?php echo $row["first_name"] + $row["last_name"]?></td>
							<td>@mdo</td>
							<td>louischen20@gmail.com</td>
							<td>@mdo</td>
							<td align="center">
								<a href="" class="text-warning"><i class="far fa-edit"></i> Edit</a> |
								<a href="" class="text-danger"><i class="far fa-trash-alt"></i>< Delete</a>
							</td>
						</tr>
						<?php endwhile; ?>
				  </tbody>
				</table>

      </div>
    </div>
	</div>

	<?php require "../reusable_code/footer_files.php"; ?>
	<?php require "../reusable_code/lightmode_files.php"; ?>

</body>
</html>
