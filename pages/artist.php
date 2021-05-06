<?php
require "../reusable_code/login_logic.php";

$artist_spotify_id = "";
$artist_spotify_id = $_REQUEST["id"];

//if search is empty redirect
if(empty(trim($artist_spotify_id))){
  header("Location: home.php");
  exit();
}

//database connection
require "../reusable_code/database_connection.php";

$sql = "SELECT * FROM artist WHERE spotify_id ='" . $artist_spotify_id . "';";
$results = $mysqli->query($sql);

if(!$results){
  echo "SQL Error: " . $mysqli->error;
  exit();
}
$row = $results->fetch_assoc();

$artist_id = $row['id'];

//Favorites
$fav_exist = false;
$sql_fav = "SELECT * FROM artist_favorites WHERE artist_id =" . $artist_id . " AND user_id =" . $curr_id . ";";
$results_fav = $mysqli->query($sql_fav);

if(!$results_fav){
  echo "SQL Error: " . $mysqli->error;
  exit();
}
$numrows_results_fav = $results_fav->num_rows;
$row_fav;
if($numrows_results_fav != 0){
  $fav_exist = true;
  $row_fav = $results_fav->fetch_assoc();
}

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

        <div id="artist_id" class="hidden">
          <?php echo $artist_spotify_id; ?>
        </div>

        <!--Playlist info Remake-->
        <div class="playlist-info d-flex flex-row flex-wrap">
          <div class="p-3">
            <img id="artist-pic" src="../images/blank-profile.png" class="playlist-main-pic"/>
          </div>
          <div class="white-text p-3">
            ARTIST
            <h1 id="artist_name"></h1>
            <div id="genre"></div>
            <div id="followers"></div>
            <br>
            <br>
            <a id="link" class="btn btn-success mr-2 green-button" href="" role="button" target="_blank"><i class="fab fa-spotify"></i> Spotify</a>
            <?php
              if($fav_exist){
            ?>
                <button type="button" class="btn btn-success mr-2 green-button remove-fav"><i class="fas fa-minus-square"></i> Remove from Favorites</button>
            <?php
              }
              else{
            ?>
                <button type="button" class="btn btn-success mr-2 green-button add-fav"><i class="fas fa-plus-square"></i> Add to Favorites</button>
            <?php
              }
            ?>
          </div>
        </div>

        <div class="text-center display_message">
          <i><?php echo $_REQUEST["hidden_message"]; ?></i>
        </div>

				<hr class="white-line">
        <div class="white-text">
          Top songs from this artist
        </div>
        <br>

				<!--songs -->
				<div id="song-list" class="song-list d-flex flex-row flex-wrap"></div>
        <br>

			</div>

      <!-- hidden form to display messages -->
      <div class="hidden">
        <form method="POST" action="<?php echo $url;?>" id="hidden_form">
          <div class="form-group">
            <input type="text" class="form-control" id="hidden_message" name="hidden_message">
          </div>
        </form>
      </div>

      <!-- hidden form to store user's ratings and comment and favorites information-->
      <div class="hidden">
        <form method="POST" action="" id="hidden_info_form">
          <div class="form-group">
            <input type="text" class="form-control" id="hidden_fav_id" value="<?php echo $row_fav['id'];?>">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="hidden_fav_userid" value="<?php echo $curr_id?>">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="hidden_fav_artistid" value="<?php echo $artist_id;?>">
          </div>
        </form>
      </div>


		</div>
	</div>

	<?php require "../reusable_code/footer_files.php"; ?>
	<?php require "../reusable_code/lightmode_files.php"; ?>
	<script>
	$(document).ready(resize);
	$(window).resize(resize);

	window.onresize = resize();

	function resize(){
		var cw = $('.playlist-pic').width();
		$('.playlist-pic').css({'height':cw+'px'});
	}
	</script>
  <script src = "../javascript_files/refresh_token.js"></script>
	<script src="../javascript_files/artist.js"></script>

</body>
</html>
