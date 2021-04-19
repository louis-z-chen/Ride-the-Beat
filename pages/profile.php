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
      <div class="column-content">

				<h1 class="white-text center-text"><i class="fas fa-user-circle"></i> Profile</h1>

				<div class="text-center display_message">
          <i><?php echo $_REQUEST["hidden_message"]; ?></i>
        </div>

				<br>

        <div class="profile center">
          <table class="table table-dark table-hover">
            <tbody>
              <tr>
                <th>First Name</th>
                <td><?php echo $curr_first; ?></td>
              </tr>
              <tr>
                <th>Last Name</th>
                <td><?php echo $curr_last; ?></td>
              </tr>
              <tr>
                <th>Username</th>
                <td><?php echo $curr_username; ?></td>
              </tr>
              <tr>
                <th>Email</th>
                <td><?php echo $curr_email; ?></td>
              </tr>
              <tr>
                <th>Account Type</th>
                <td>
									<?php
										$security =  $curr_security_level;
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
								</td>
              </tr>
            </tbody>
          </table>

					<!-- hidden div to pass php variables to jquert -->
					<div class="hidden">
						<span id="first_name"> <?php echo $curr_first;?></span>
						<span id="last_name"> <?php echo $curr_last;?></span>
						<span id="username"> <?php echo $curr_username;?></span>
						<span id="email"> <?php echo $curr_email;?></span>
						<span id="security_level"> <?php echo $curr_security_level;?></span>
					</div>

					<div class="hidden">
		        <form method="POST" action="../pages/profile.php" id="hidden_form">
		          <div class="form-group">
		            <input type="text" class="form-control" id="hidden_message" name="hidden_message">
		          </div>
		        </form>
		      </div>

          <br>
          <div class = "center-text">
            <button type="button" class="btn btn-outline-warning edit" value="<?php echo $curr_id; ?>"><i class="far fa-edit"></i> Edit</button>
            <button type="button" class="btn btn-outline-danger delete" value="<?php echo $curr_id; ?>"><i class="far fa-trash-alt"></i> Delete</button>
          </div>
        </div>


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
            <div class="form-group hidden">
              <label>Security Level</label>
              <select class="form-control" id="esecurity">
                <option value = "1">User</option>
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
            <p>Are you sure you want to delete your account?</p>
            <p class="text-danger"><small>This action cannot be undone. <br>You will be redirected to the welcome page.</small></p>

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

	<?php require "../reusable_code/footer_files.php"; ?>
	<?php require "../reusable_code/lightmode_files.php"; ?>
	<script src = "../javascript_files/profile.js"></script>

</body>
</html>
