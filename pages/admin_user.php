<?php
require "../reusable_code/login_logic.php";
require "../reusable_code/curr_user_info.php";

// if not an admin
if($curr_security_level < 2){
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

//define how many table rows per pages
$results_per_page = 10;

//find out the number of results stored in the database_connection
$sql = "SELECT * FROM users WHERE first_name LIKE ? AND last_name LIKE ? AND username LIKE ? AND email LIKE ? AND security_level LIKE ?;";
$statement = $mysqli->prepare($sql);
$statement->bind_param('sssss', $first_name, $last_name, $username, $email, $security_level);
$executed = $statement->execute();

if(!$executed) {
    echo $mysqli->error;
}

$results = $statement->get_result();
$number_of_results = $results->num_rows;

$statement->close();

//determine number of total pages available
$number_of_pages = ceil($number_of_results/$results_per_page);

//determine which page number visitor is currently on
if(!isset($_GET['page'])){
  $page = 1;
}
else {
  $page = $_GET['page'];
}

//determine the sql LIMIT starting number for the results on the displaying page
$this_page_first_result = ($page-1)*$results_per_page;

//retrieve selected results from database
//search prepared statement
$sql_search = "SELECT * FROM users WHERE first_name LIKE ? AND last_name LIKE ? AND username LIKE ? AND email LIKE ? AND security_level LIKE ? ORDER BY security_level DESC, first_name LIMIT ?, ?;";
$statement_search = $mysqli->prepare($sql_search);
$statement_search->bind_param('sssssii', $first_name, $last_name, $username, $email, $security_level, $this_page_first_result, $results_per_page);
$executed_search = $statement_search->execute();

if(!$executed_search) {
    echo $mysqli->error;
}

$results = $statement_search->get_result();
$curr_result_count = $results->num_rows;

$statement_search->close();

$mysqli->close();

//display the links to the pages
//always showing 3 pages and numbers change to reflect that
$first_page = 0;
$second_page = 0;
$third_page = 0;

$first_active = false;
$second_active = false;
$third_active = false;

//if first page
if($page == 1){
  $first_page = 1;
  $second_page = 2;
  $third_page = 3;
  $first_active = true;
}
//if last page
else if($page == $number_of_pages){
  $third_page = $number_of_pages;
  $second_page = $third_page - 1;
  $first_page = $second_page - 1;
  $third_active = true;
}
else{
  $second_page = $page;
  $first_page = $second_page - 1;
  $third_page = $second_page + 1;
  $second_active = true;
}

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

				<h1 class="white-text center-text"><i class="fas fa-users"></i> User Accounts</h1>

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

        <div class="text-center display_message">
          <i><?php echo $_REQUEST["hidden_message"]; ?></i>
        </div>

        <!--table-->
        <div class="row">
          <div class="col-6">
            <h2 class="white-text">Manage Accounts</h2>
          </div>
          <div class="col-6" align="right">
            <!--<a href="#add_user" class="btn btn-success" data-toggle="modal"><i class="fas fa-user-plus"></i> <span> Add New User</span></a>-->
            <button type="button" class="btn btn-success add"><i class="fas fa-user-plus"></i> Add New User</button>
          </div>
        </div>

        <div class="table-responsive-xl">
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
              <?php $counter = $this_page_first_result + 1;?>
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
                      $display_security = "<a class='leader' href='https://bit.ly/3afqBUM'>Supreme Leader</a>";
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
                  <button type="button" class="btn btn-outline-danger delete" value="<?php echo $row['ID']; ?>"><i class="far fa-trash-alt"></i> Delete</button>
                </td>
              </tr>
              <?php endwhile; ?>
            </tbody>
          </table>
          <div>
            <div class="row">
              <div class="col-6">
                  <h5 class="white-text">Showing <?php echo $this_page_first_result + 1; ?> to <?php echo $this_page_first_result + $curr_result_count; ?> of <?php echo $number_of_results; ?> results</h5>
              </div>
              <div class="col-6 text-right">
                <ul class="pagination justify-content-end">
                  <li class="page-item">
                    <a class="page-link" href="admin_user.php?page=1" aria-label="First">
                      <span aria-hidden="true">&laquo;</span>
                      <span class="sr-only">First</span>
                    </a>
                  </li>
                  <li class="page-item <?php if($first_active){ echo "active";} ?>"><a class="page-link" href="admin_user.php?page=<?php echo $first_page; ?>"><?php echo $first_page; ?></a></li>
                  <li class="page-item <?php if($second_active){ echo "active";} ?>"><a class="page-link" href="admin_user.php?page=<?php echo $second_page; ?>"><?php echo $second_page; ?></a></li>
                  <li class="page-item <?php if($third_active){ echo "active";} ?>"><a class="page-link" href="admin_user.php?page=<?php echo $third_page; ?>"><?php echo $third_page; ?></a></li>
                  <li class="page-item">
                    <a class="page-link" href="admin_user.php?page=<?php echo $number_of_pages ?>" aria-label="Last">
                      <span aria-hidden="true">&raquo;</span>
                      <span class="sr-only">Last</span>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="hidden">
        <form method="POST" action="../pages/admin_user.php" id="hidden_form">
          <div class="form-group">
            <input type="text" class="form-control" id="hidden_message" name="hidden_message">
          </div>
        </form>
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
                <ul class="form-messages" id="add_errors"></ul>
    						<div class="form-group">
    							<label>First Name</label>
    							<input type="text" class="form-control" id="afirst">
    						</div>
                <div class="form-group">
    							<label>Last Name</label>
    							<input type="text" class="form-control" id="alast">
    						</div>
    						<div class="form-group">
    							<label>Email</label>
    							<input type="email" class="form-control" id="aemail">
    						</div>
    						<div class="form-group">
    							<label>Username</label>
    							<input type="text" class="form-control" id="ausername">
    						</div>
                <div class="form-group">
    							<label>Password</label>
    							<input type="password" class="form-control" id="apassword">
    						</div>
                <div class="form-group">
                  <label>Confirm Password</label>
                  <input type="password" class="form-control" id="apassword2">
                </div>
                <div class="form-group">
    							<label>Security Level</label>
                  <select class="form-control" id="asecurity">
                    <option value = "1" selected>User</option>
                    <option value = "2">Administrator</option>
                    <option value = "3">Supreme Leader</option>
                  </select>
    						</div>
    					</div>
    					<div class="modal-footer">
    						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
    						<input type="submit" class="btn btn-success" id="add-btn" value="Add">
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
                  <input type="hidden" class="form-control" id="eid">
                </div>
                <ul class="form-messages" id="edit_errors"></ul>
    						<div class="form-group">
    							<label>First Name</label>
    							<input type="text" class="form-control" id="efirst">
    						</div>
                <div class="form-group">
    							<label>Last Name</label>
    							<input type="text" class="form-control" id="elast">
    						</div>
    						<div class="form-group">
    							<label>Email</label>
    							<input type="email" class="form-control" id="eemail">
    						</div>
    						<div class="form-group">
    							<label>Username</label>
    							<input type="text" class="form-control" id="eusername">
    						</div>
                <div class="form-group">
    							<label>Password</label>
    							<input type="password" class="form-control" id="epassword">
    						</div>
                <div class="form-group">
    							<label>Security Level</label>
                  <select class="form-control" id="esecurity">
                    <option value = "1" selected>User</option>
                    <option value = "2">Administrator</option>
                    <option value = "3">Supreme Leader</option>
                  </select>
    						</div>
    					</div>
    					<div class="modal-footer">
    						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
    						<input type="submit" class="btn btn-success" id="edit-btn" value="Save Changes">
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
    						<h4 class="modal-title">Delete User</h4>
    						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    					</div>
    					<div class="modal-body">
                <div class="form-group">
                  <input type="hidden" class="form-control" id="did">
                </div>
    						<p>Are you sure you want to delete this user account?</p>
    						<p class="text-danger"><small>This action cannot be undone. <br>If you are deleting your own account, you will be redirected to the welcome page.</small></p>

                <ul class="form-messages" id="delete_errors"></ul>
    					</div>
    					<div class="modal-footer">
    						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
    						<input type="submit" class="btn btn-danger" id="delete-btn" value="Delete">
    					</div>
    				</form>
    			</div>
    		</div>
    	</div>

    </div>
	</div>

	<?php require "../reusable_code/footer_files.php"; ?>
	<?php require "../reusable_code/lightmode_files.php"; ?>
  <script src = "../javascript_files/admin_user.js"></script>
</body>
</html>
