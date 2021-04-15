<?php
require "../reusable_code/login_logic.php";

// if not an admin
if($_SESSION["security_level"] < 2){
  header('Location: ../pages/home.php');
  exit();
}

//database connection
require "../reusable_code/database_connection.php";

//search
//declare variables
$first_name = "%%";
$last_name = "%%";
$username = "%%";
$email = "%%";
$security_level = "%%";

//set variables
if(isset($_REQUEST["first_name"]) && $_REQUEST["first_name"]!=""){
	$first_name = "%".$_REQUEST["first_name"]."%";
}
if(isset($_REQUEST["last_name"]) && $_REQUEST["last_name"]!=""){
	$last_name = "%".$_REQUEST["last_name"]."%";
}
if(isset($_REQUEST["username"]) && $_REQUEST["username"]!=""){
	$username = "%".$_REQUEST["username"]."%";
}
if(isset($_REQUEST["email"]) && $_REQUEST["email"]!=""){
	$email = "%".$_REQUEST["email"]."%";
}
if(isset($_REQUEST["security_level"]) && $_REQUEST["security_level"]!="" && $_REQUEST["security_level"]!="all"){
	$security_level = "%".$_REQUEST["security_level"]."%";
}

//search prepared statement
$sql_search = "SELECT * FROM users WHERE first_name LIKE ? AND last_name LIKE ? AND username LIKE ? AND email LIKE ? AND security_level LIKE ? ORDER BY security_level DESC, first_name;";
$statement_search = $mysqli->prepare($sql_search);
$statement_search->bind_param('sssss', $first_name, $last_name, $username, $email, $security_level);
$executed_search = $statement_search->execute();

if(!$executed_search) {
    echo $mysqli->error;
}

$results = $statement_search->get_result();
$user_count = $results->num_rows;

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
      <div class="column-content">

				<h1 class="white-text center-text">User Accounts</h1>

        <!--search bar-->
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
                  <select class="form-control" name="security_level" placeholder="Enter security level">
                    <option value = "all" <?php echo $_REQUEST['security_level'] == "all" ? "selected" : "" ?>>All</option>
                    <option value = "1" <?php echo $_REQUEST['security_level'] == "1" ? "selected" : "" ?>>User</option>
                    <option value = "2" <?php echo $_REQUEST['security_level'] == "2" ? "selected" : "" ?>>Administrator</option>
                    <option value = "3" <?php echo $_REQUEST['security_level'] == "3" ? "selected" : "" ?>>Supreme Leader</option>
                  </select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<div>
										<button type="submit" name="submit" value="search" id="submit" class="btn btn-primary btn-space"><i class="fa fa-fw fa-search"></i> Search</button>
										<a href="<?php echo $_SERVER['PHP_SELF'];?>" class="btn btn-danger"><i class="fa fa-fw fa-sync"></i> Clear</a>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>

        <hr class="white-line">
        <br>

        <!--table-->
        <div class="row">
          <div class="col-6">
            <h2 class="white-text">Manage Accounts</h2>
            <h5 class="white-text"><?php echo $user_count . " users";?></h5>
          </div>
          <div class="col-6" align="right">
            <a href="#add_user" class="btn btn-success" data-toggle="modal"><i class="fas fa-user-plus"></i> <span> Add New User</span></a>
          </div>
        </div>

        <table class="table table-dark table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">First Name</th>
              <th scope="col">Last Name</th>
              <th scope="col">Username</th>
              <th scope="col">Email</th>
              <th scope="col">Security Level</th>
              <th scope="col" class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $counter = 1;?>
            <?php while($row = $results->fetch_assoc()) : ?>
              <tr>
              <th scope="row"><?php echo $counter ?></th>
              <?php $counter++;?>
              <td><span id="first_name<?php echo $row["ID"];?>"> <?php echo $row["first_name"];?></span></td>
              <td><span id="last_name<?php echo $row["ID"];?>"> <?php echo $row["last_name"];?></span></td>
              <td><span id="username<?php echo $row["ID"];?>"> <?php echo $row["username"];?></span></td>
              <td><span id="email<?php echo $row["ID"];?>"> <?php echo $row["email"];?></span></td>
              <td><span id="security_level<?php echo $row["ID"];?>">
                <?php
                  $security = $row["security_level"];
                  $display_security = "";
                  if($security == 3){
                    $display_security = "Supreme Leader";
                  }
                  else if($security == 2){
                    $display_security = "Administrator";
                  }
                  else{
                    $display_security = "User";
                  }

                  echo $display_security;
                ?>
                </span>
              </td>
              <td align="center">
                <button type="button" class="btn btn-outline-warning edit" value="<?php echo $row['ID']; ?>"><i class="far fa-edit"></i> Edit</button>
                <button type="button" class="btn btn-outline-danger" value="<?php echo $row['ID']; ?>"><i class="far fa-trash-alt"></i> Delete</button>
              </td>
            </tr>
            <?php endwhile; ?>
          </tbody>
        </table>

      </div>

      <!-- Add Modal HTML -->
    	<div id="add_user" class="modal fade">
    		<div class="modal-dialog modal-dialog-centered">
    			<div class="modal-content">
    				<form>
    					<div class="modal-header">
    						<h4 class="modal-title">Add User</h4>
    						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    					</div>
    					<div class="modal-body">
    						<div class="form-group">
    							<label>First Name</label>
    							<input type="text" class="form-control" required>
    						</div>
                <div class="form-group">
    							<label>Last Name</label>
    							<input type="text" class="form-control" required>
    						</div>
    						<div class="form-group">
    							<label>Email</label>
    							<input type="email" class="form-control" required>
    						</div>
    						<div class="form-group">
    							<label>Username</label>
    							<input type="text" class="form-control" required>
    						</div>
                <div class="form-group">
    							<label>Password</label>
    							<input type="text" class="form-control" required>
    						</div>
                <div class="form-group">
    							<label>Security Level</label>
                  <select class="form-control" required>
                    <option value = "1" selected>User</option>
                    <option value = "2">Administrator</option>
                    <option value = "3">Supreme Leader</option>
                  </select>
    						</div>
    					</div>
    					<div class="modal-footer">
    						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
    						<input type="submit" class="btn btn-success" value="Add">
    					</div>
    				</form>
    			</div>
    		</div>
    	</div>

      <!-- Edit Modal HTML -->
    	<div id="edit_user" class="modal fade">
    		<div class="modal-dialog modal-dialog-centered">
    			<div class="modal-content">
            <form>
    					<div class="modal-header">
    						<h4 class="modal-title">Edit User</h4>
    						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    					</div>
    					<div class="modal-body">
    						<div class="form-group">
    							<label>First Name</label>
    							<input type="text" class="form-control" id="efirst" required>
    						</div>
                <div class="form-group">
    							<label>Last Name</label>
    							<input type="text" class="form-control" id="elast" required>
    						</div>
    						<div class="form-group">
    							<label>Email</label>
    							<input type="email" class="form-control" id="eemail" required>
    						</div>
    						<div class="form-group">
    							<label>Username</label>
    							<input type="text" class="form-control" id="eusername" required>
    						</div>
                <div class="form-group">
    							<label>Password</label>
    							<input type="text" class="form-control" id="epassword" required>
    						</div>
                <div class="form-group">
    							<label>Security Level</label>
                  <select class="form-control" required id="esecurity">
                    <option value = "1" selected>User</option>
                    <option value = "2">Administrator</option>
                    <option value = "3">Supreme Leader</option>
                  </select>
    						</div>
    					</div>
    					<div class="modal-footer">
    						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
    						<input type="submit" class="btn btn-success" value="Save Changes">
    					</div>
    				</form>
    			</div>
    		</div>
    	</div>

    	<!-- Delete Modal HTML -->
    	<div id="delete_user" class="modal fade">
    		<div class="modal-dialog modal-dialog-centered">
    			<div class="modal-content">
    				<form>
    					<div class="modal-header">
    						<h4 class="modal-title">Delete Employee</h4>
    						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    					</div>
    					<div class="modal-body">
    						<p>Are you sure you want to delete these Records?</p>
    						<p class="text-warning"><small>This action cannot be undone.</small></p>
    					</div>
    					<div class="modal-footer">
    						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
    						<input type="submit" class="btn btn-danger" value="Delete">
    					</div>
    				</form>
    			</div>
    		</div>
    	</div>

    </div>
	</div>

	<?php require "../reusable_code/footer_files.php"; ?>
	<?php require "../reusable_code/lightmode_files.php"; ?>
  <!-- JS code to fill modals with data -->
  <script>
    $(document).ready(function(){
    	$(document).on('click', '.edit', function(){
    		var id = $(this).val();
        var first = $('#first_name'+id).text();
        var last = $('#last_name'+id).text();
        var username = $('#username'+id).text();
        var email = $('#email'+id).text();
        var security = $('#security_level'+id).text();
        security = $.trim(security);

        $('#edit_user').modal('show');
        $("#efirst").val(first);
        $("#elast").val(last);
        $("#eemail").val(email);
        $("#eusername").val(username);
        if(security === "Supreme Leader"){
          $("#esecurity").val("3");
        }
        else if(security === "Administrator"){
          $("#esecurity").val("2");
        }
        else{
          $("#esecurity").val("1");
        }
    	});
    });
  </script>
</body>
</html>
