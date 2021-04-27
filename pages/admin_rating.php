<?php
require "../reusable_code/login_logic.php";

// if not an admin
if($curr_security_level < 2){
  header('Location: ../pages/home.php');
  exit();
}

//database connection
require "../reusable_code/database_connection.php";

//declare variables
$rater_first_name = "%%";
$rater_last_name = "%%";
$rater_username = "%%";
$playlist_name = "%%";
$comment = "%%";


//define how many table rows per pages
$results_per_page = 10;

//find out the number of results stored in the database_connection
//$sql = "SELECT * FROM ratings_info_view WHERE rater_first_name LIKE ? AND rater_last_name LIKE ? AND rater_username LIKE ? AND playlist_name LIKE ? AND comment LIKE ?;";
//$statement = $mysqli->prepare($sql);
//$statement->bind_param('sssss', $rater_first_name, $rater_last_name, $rater_username, $playlist_name, $comment);
//$executed = $statement->execute();
$sql = "SELECT * FROM ratings_info_view";
echo $sql;
$results = $mysqli->query($sql);
if(!$results){
  echo "hello" . $mysqli->error;
  exit();
}


// if(!$executed) {
//     echo $mysqli->error;
// }

// $results = $statement->get_result();
$number_of_results = (int)$results->num_rows;

// $statement->close();

//determine number of total pages available
$number_of_pages = ceil($number_of_results/$results_per_page);

//determine which page number visitor is currently on
if(!isset($_REQUEST['page'])){
  $page = 1;
}
else {
  $page = $_REQUEST['page'];
}

//determine the sql LIMIT starting number for the results on the displaying page
$this_page_first_result = ($page-1)*$results_per_page;

//retrieve selected results from database
//search prepared statement
// $sql_search = "SELECT * FROM ratings_info_view WHERE rater_first_name LIKE ? AND rater_last_name LIKE ? AND rater_username LIKE ? AND playlist_name LIKE ? AND comment LIKE ? ORDER BY playlist_name DESC, rater_first_name LIMIT ?, ?;";
// $statement_search = $mysqli->prepare($sql_search);
// $statement_search->bind_param('sssssii', $rater_first_name, $rater_last_name, $rater_username, $playlist_name, $comment, $this_page_first_result, $results_per_page);
// $executed_search = $statement_search->execute();

// if(!$executed_search) {
//     echo $mysqli->error;
// }

// $results = $statement_search->get_result();
// $curr_result_count = $results->num_rows;
//
// $statement_search->close();
//
// $mysqli->close();

//display the links to the pages
//always showing 3 pages and numbers change to reflect that
$first_page = 0;
$second_page = 0;
$third_page = 0;

$first_active = false;
$second_active = false;
$third_active = false;

$second_disable = false;
$third_disable = false;

//if first page
if($number_of_pages >= 3){
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
}
else if($number_of_pages == 2){
  $third_disable = true;
  $first_page = 1;
  $second_page = 2;
  $third_page = 3;
  if($page == 1){
    $first_active = true;
  }
  else{
    $second_active = true;
  }
}
else{
  $second_disable = true;
  $third_disable = true;
  $first_page = 1;
  $second_page = 2;
  $third_page = 3;
  $first_active = true;
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

				<h1 class="white-text center-text"><i class="fas fa-users"></i> User Ratings</h1>

        <!--table-->
        <div class="row">
          <div class="col-6">
            <h2 class="white-text">Manage Ratings</h2>
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
                <th scope="col">Playlist Name</th>
                <th scope="col">Comment</th>
              </tr>
            </thead>
            <tbody>
              <?php $counter = $this_page_first_result + 1;?>
              <?php while($row = $results->fetch_assoc()) {?>
                <tr>
                <th scope="row"><?php echo $counter ?></th>
                <?php $counter++;?>
                <td><span id="rater_first_name<?php echo $row["ID"];?>"> <?php echo $row["rater_first_name"];?></span></td>
                <td><span id="rater_last_name<?php echo $row["ID"];?>"> <?php echo $row["rater_last_name"];?></span></td>
                <td><span id="rater_username<?php echo $row["ID"];?>"> <?php echo $row["rater_username"];?></span></td>
                <td><span id="playlist_name<?php echo $row["ID"];?>"> <?php echo $row["playlist_name"];?></span></td>
                <td><span id="comment<?php echo $row["ID"];?>"> <?php echo $row["comment"];?></span></td>
                  </span>
                </td>
                <td align="center">
                  <button type="button" class="btn btn-outline-warning edit" value="<?php echo $row['ID']; ?>"><i class="far fa-edit"></i> Edit</button>
                  <button type="button" class="btn btn-outline-danger delete" value="<?php echo $row['ID']; ?>"><i class="far fa-trash-alt"></i> Delete</button>
                </td>
              </tr>
            <?php } ?>
            </tbody>
          </table>
          <div>
            <div class="row">
              <div class="col-6">
                  <h5 class="white-text">
                    <?php if($curr_result_count > 0){
                      echo "Showing " . ($this_page_first_result + 1) . " to " . ($this_page_first_result + $curr_result_count) . " of " . $number_of_results . " results";
                    }
                    else{
                      echo "0 results";
                    }
                    ?>
                  </h5>
              </div>
              <div class="col-6 text-right">
                <ul class="pagination justify-content-end">
                  <li class="page-item page-btn" value = "1">
                    <a class="page-link" aria-label="First">
                      <span aria-hidden="true">&laquo;</span>
                      <span class="sr-only">First</span>
                    </a>
                  </li>
                  <li class="page-item page-btn <?php if($first_active){ echo "active";} ?>" value = "<?php echo $first_page; ?>"><a class="page-link"><?php echo $first_page; ?></a></li>
                  <li class="page-item <?php if($second_active){ echo "active";} ?> <?php if($second_disable){ echo "disabled";} else{ echo "page-btn";} ?>" value = "<?php echo $second_page; ?>"><a class="page-link"><?php echo $second_page; ?></a></li>
                  <li class="page-item <?php if($third_active){ echo "active";} ?> <?php if($third_disable){ echo "disabled";} else{ echo "page-btn";} ?>" value = "<?php echo $third_page; ?>"><a class="page-link"><?php echo $third_page; ?></a></li>
                  <li class="page-item page-btn" value = "<?php echo $number_of_pages; ?>">
                    <a class="page-link" aria-label="Last">
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

      <!-- hidden form to display edit and delete messages -->
      <div class="hidden">
        <form method="POST" action="../pages/admin_rating.php" id="hidden_form">
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
    						<h4 class="modal-title">Add Rating</h4>
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
  <!-- <script src = "../javascript_files/admin_rating.js"></script> -->
</body>
</html>
