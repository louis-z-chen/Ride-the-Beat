<?php
require "../reusable_code/login_logic.php";

$playlist_id = "";
$playlist_id = $_REQUEST["id"];

//if search is empty redirect
if(empty(trim($playlist_id))){
  header("Location: home.php");
  exit();
}

//database connection
require "../reusable_code/database_connection.php";

//average Rating
$sql_avg = "SELECT * FROM avg_ratings_view WHERE playlist_id =" . $playlist_id . ";";

$results_avg = $mysqli->query($sql_avg);

if(!$results_avg){
  echo "SQL Error: " . $mysqli->error;
  exit();
}
$numrows_results_avg = $results_avg->num_rows;
$row_avg;
if($numrows_results_avg != 0){
  $row_avg = $results_avg->fetch_assoc();
}
//echo $numrows_results_avg;

//user rating
$sql_user_rating = "SELECT * FROM ratings_info_view WHERE playlist_id =" . $playlist_id . " AND rater_id =" . $curr_id . ";";

$results_rating = $mysqli->query($sql_user_rating);

if(!$results_rating){
  echo "SQL Error: " . $mysqli->error;
  exit();
}
$numrows_results_rating = $results_rating->num_rows;
$row_rating;
if($numrows_results_rating != 0){
  $row_rating = $results_rating->fetch_assoc();
}
//echo $numrows_results_rating;

//User playlists
$sql_playlist = "SELECT * FROM playlist_info_view WHERE playlist_id =" . $playlist_id . ";";

$results_playlist = $mysqli->query($sql_playlist);

if(!$results_playlist){
  echo "SQL Error: " . $mysqli->error;
  exit();
}
$row = $results_playlist->fetch_assoc();

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

        <div id="playlist_id" class="hidden">
          <?php echo $row['spotify_id']; ?>
        </div>

        <!--Playlist info Remake-->
        <div class="playlist-info d-flex flex-row flex-wrap">
          <div class="p-3">
            <img src="<?php echo $row['image_url']; ?>" class="playlist-main-pic"/>
          </div>
          <div class="white-text p-3">
            PLAYLIST
            <h1><?php echo $row['name']; ?></h1>
            <div>
              Created by <?php echo $row['creator_first_name'];?> <?php echo $row['creator_last_name'];?> - <div style="display:inline;">15 songs</div>
            </div>
            Average Rating - 5.0
            <br>
            Your Rating - 5.0
            <br>
            <br>
            <button type="button" class="btn btn-success mr-2 green-button"><i class="fas fa-thumbs-up"></i> Rate</button>
            <button type="button" class="btn btn-success mr-2 green-button"><i class="fas fa-share-square"></i> Share</button>
            <a class="btn btn-success mr-2 green-button" href="<?php echo $row['url'];?>" role="button" target="_blank"><i class="fab fa-spotify"></i> Spotify</a>
          </div>
        </div>

				<hr class="white-line">
        <div class="white-text">
          Some songs from this playlist
        </div>

				<!--songs -->
				<div id="song-list" class="song-list d-flex flex-row flex-wrap"></div>

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
	<script src="../javascript_files/playlist.js"></script>

</body>
</html>
