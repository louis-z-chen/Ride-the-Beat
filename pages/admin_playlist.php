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
$name = "%%";
$image_url = "%%";
$creator_id = "%%";
$public = "%%";
$url = "%%";
$spotify_id = "%%";


// session variables for creator_id, creator_first_name, etc tracking who is logged in right now

$test = $_SESSION["id"];

$sql = "INSERT INTO playlist
       (image_url, name, public, url, spotify_id, creator_id)
        VALUES
        ('" . $_REQUEST["imageurl"] . "' , '" . $_REQUEST["playlistname"] . "' , '" . $_REQUEST["public"] . "' , '" . $_REQUEST["playlisturl"] . "','" . $_REQUEST["playlistid"] . "', $test)";

echo $sql;

if(!empty($_REQUEST["imageurl"]) && !empty($_REQUEST["playlistname"]) && !empty($_REQUEST["public"]) && !empty($_REQUEST["playlisturl"]) && !empty($_REQUEST["playlistid"])) {
  $results = $mysqli->query($sql);
   echo $sql;
   if(!$results) {
    echo $mysqli->error;
   }
 }

 $sql = "SELECT * FROM playlist_info_view";
 $results = $mysqli->query($sql);
 if(!$results){
   echo "hello" . $mysqli->error;
   exit();
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

				<h1 class="white-text center-text"><i class="fas fa-users"></i>  User Playlists</h1>
        <br />
        <br />

        <!--table-->
        <div class="row">
          <div class="col-6">
            <h2 class="white-text">Manage Playlists</h2>
          </div>
          <div class="col-6" align="right">
            <!--<a href="#add_user" class="btn btn-success" data-toggle="modal"><i class="fas fa-user-plus"></i> <span> Add New User</span></a>-->
            <button type="button" class="btn btn-success add"><i class="fas fa-user-plus"></i> Add Playlist</button>
          </div>
        </div>
<br />
<br />

        <div class="table-responsive-xl">
          <table class="table table-dark table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Playlist Name</th>
                <th scope="col">Public</th>
                <th scope="col">Playlist URL</th>
                <th scope="col">Spotify Playlist ID</th>
                <th scope="col">Playlist Image</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              <?php while($row = $results->fetch_assoc()) {?>
                <tr>
                <th scope="row"><?php echo $counter ?></th>
                <?php $counter++;?>
                <td><span id="name<?php echo $row["ID"];?>"> <?php echo $row["name"];?></span></td>
                <td><span id="public<?php echo $row["ID"];?>"> <?php echo $row["public"];?></span></td>
                <td><span id="url<?php echo $row["ID"];?>"> <?php echo $row["url"];?></span></td>
                <td><span id="spotify_id<?php echo $row["ID"];?>"> <?php echo $row["spotify_id"];?></span></td>
                <td><span id="image_url<?php echo $row["ID"];?>"> <img src="<?php echo $row['image_url'];?>" width='150' height='150'/></span></td>
                  </span>
                </td>
                <td align="center">
                  <button type="button" class="btn btn-outline-warning edit" value="<?php echo $row['ID']; ?>"><i class="far fa-edit"></i>Edit</button>
                </td>
              </tr>
            <?php } ?>
            </tbody>
          </table>
        </div>
      </div>

      <!-- hidden form to display edit and delete messages -->
      <div class="hidden">
        <form method="POST" action="../pages/admin_playlist.php" id="hidden_form">
          <div class="form-group">
            <input type="text" class="form-control" id="hidden_message" name="hidden_message">
          </div>
        </form>
      </div>

      <!-- Add Modal HTML -->
    	<div id="add_playlist" class="modal fade">
    		<div class="modal-dialog modal-dialog-centered">
    			<div class="modal-content">
    				<form>
    					<div class="modal-header">
    						<h4 class="modal-title">Add Playlist</h4>
    						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    					</div>
    					<div class="modal-body">
                <ul class="form-messages" id="add_errors"></ul>
                <div class="form-group">
    							<label>Playlist Image URL</label>
    							<input type="url" name="imageurl" class="form-control" id="pimageurl">
    						</div>
    						<div class="form-group">
    							<label>Playlist Name</label>
    							<input type="text" name="playlistname" class="form-control" id="pname">
    						</div>
    						<div class="form-group">
    							<label>Public</label>
    							<input type="number" min="0" max="1" name="public" class="form-control" id="ppublic">
    						</div>
                <div class="form-group">
    							<label>Playlist URL</label>
    							<input type="url" name="playlisturl" class="form-control" id="purl">
    						</div>
                <div class="form-group">
                  <label>Spotify Playlist ID</label>
                  <input type="text" name="playlistid" class="form-control" id="pspotifyid">
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
    	<div id="edit_playlist" class="modal fade">
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

    </div>
	</div>

	<?php require "../reusable_code/footer_files.php"; ?>
	<?php require "../reusable_code/lightmode_files.php"; ?>
  <?php // require "../backend/add_playlist.php"; ?>
<script src = "../javascript_files/admin_playlist.js"></script>
</body>
</html>
