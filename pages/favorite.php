<?php
require "../reusable_code/login_logic.php";

//database connection
require "../reusable_code/database_connection.php";

//Artist
$sql_artist = "SELECT * FROM fav_artists_view WHERE user_id =" . $curr_id . ";";
$results_artist = $mysqli->query($sql_artist);

if(!$results_artist){
  echo "SQL Error: " . $mysqli->error;
  exit();
}
$numrows_artist = $results_artist->num_rows;

//Playlists
$sql_playlist = "SELECT * FROM fav_playlists_view WHERE user_id =" . $curr_id . ";";
$results_playlist = $mysqli->query($sql_playlist);

if(!$results_playlist){
  echo "SQL Error: " . $mysqli->error;
  exit();
}
$numrows_playlist = $results_playlist->num_rows;

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

				<div class="white-text">
					<br>
					<h1 class="white-text center-text"><i class="fas fa-bookmark"></i> Favorites</h1>
          <div class="center-text">
            <input id="toggle-btn" type="checkbox" checked data-toggle="toggle" data-width="150" data-on="<i class='fas fa-user-friends'></i> Artists" data-off="<i class='fas fa-list-ul'></i> Playlists" data-onstyle="success" data-offstyle="success">
          </div>
        </div>

        <div id="spotify-results" class="spotify-results">
          <h3 class="white-text"><?php echo $numrows_artist; ?> Favorite Artist<?php if($numrows_artist != 1){echo "s";} ?></h3>
          <div class="d-flex flex-row flex-wrap">
            <?php while($row = $results_artist->fetch_assoc() ) : ?>
              <div class="spot-container p-2">
                <a href="../pages/artist.php?id=<?php echo $row['spotify_id']; ?>">
                  <img src="<?php echo $row['image_url']; ?>" class="playlist-pic"/>
                </a>
                <div class="spot-title white-text center-text"><?php echo $row['name']; ?></div>
              </div>
            <?php endwhile; ?>
          </div>
        </div>

        <div id="database-results"class="database-results">
          <h3 class="white-text"><?php echo $numrows_playlist; ?> Favorite Playlist<?php if($numrows_playlist != 1){echo "s";} ?></h3>
          <div class="d-flex flex-row flex-wrap">
            <?php while($row = $results_playlist->fetch_assoc() ) : ?>
              <div class="spot-container p-2">
                <a href="../pages/playlist.php?id=<?php echo $row['playlist_id']; ?>">
                  <img src="<?php echo $row['image_url']; ?>" class="playlist-pic"/>
                </a>
                <div class="spot-title white-text center-text"><?php echo $row['name']; ?></div>
              </div>
            <?php endwhile; ?>
          </div>
        </div>


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
  <script src = "../javascript_files/favorite.js"></script>

</body>
</html>
