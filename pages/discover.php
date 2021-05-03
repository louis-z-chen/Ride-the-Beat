<?php
require "../reusable_code/login_logic.php";

//database connection
require "../reusable_code/database_connection.php";

//Artist
$sql_artist = "SELECT * FROM artist ORDER BY RAND() LIMIT 10;";

$results_artist = $mysqli->query($sql_artist);

if(!$results_artist){
  echo "SQL Error: " . $mysqli->error;
  exit();
}

//Playlists
$sql_playlist = "SELECT * FROM avg_ratings_view ORDER BY rating DESC, playlist_name  LIMIT 10;";

$results_playlist = $mysqli->query($sql_playlist);

if(!$results_playlist){
  echo "SQL Error: " . $mysqli->error;
  exit();
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

				<div class="white-text">
					<br>
					<h1 class="white-text center-text"><i class="fab fa-angellist"></i> Discover</h1>
				</div>
				<hr class="white-line">

        <h3 class="white-text">Artist Spotlight</h3>
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

				<h3 class="white-text">Highest Rated Playlists</h3>
				<div class="d-flex flex-row flex-wrap">
          <?php while($row = $results_playlist->fetch_assoc() ) : ?>
						<div class="spot-container p-2">
							<a href="../pages/playlist.php?id=<?php echo $row['playlist_id']; ?>">
								<img src="<?php echo $row['image_url']; ?>" class="playlist-pic"/>
							</a>
							<div class="spot-title white-text center-text"><?php echo $row['playlist_name']; ?></div>
              <div class="spot-title white-text center-text"><?php echo $row['rating']; ?> Rating</div>
						</div>
					<?php endwhile; ?>
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

</body>
</html>
