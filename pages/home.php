<?php
require "../reusable_code/login_logic.php";

//database connection
require "../reusable_code/database_connection.php";

//User playlists
$sql_playlist = "SELECT * FROM avg_ratings_view ORDER BY rating DESC, playlist_name LIMIT 5;";

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

<style>

@media(max-width:320px) {
.bannertext {
		font-size: 30px;
		word-break: break-all;
	}
}

@media(max-width:767px) {
.bannertext {
		font-size: 30px;
		word-break: break-all;
	}
}

@media(max-width:1000px) {
.bannertext {
		font-size: 30px;
		word-break: break-all;
	}
}

@media(max-width:1200px) {
.bannertext {
		font-size: 30px;
		word-break: break-all;
	}
}
</style>
</head>
<body>
	<?php require "../reusable_code/menu.php"; ?>

	<div class = "main-body center">
		<div class="column">
			<div class="column-content">

				<br>
				<div class="content-row">
					<div class="left-banner white-text">
						<h1 class="bannertext">Welcome <?php echo $curr_first ?>!</h1>
					</div>
				</div>

				<br>
				<h4 class="white-text">Highly Rated Playlists</h4>
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

				<br>

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
