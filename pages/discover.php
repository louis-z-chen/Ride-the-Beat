<?php
require "../reusable_code/login_logic.php";

$search_user = isset($_REQUEST['user']) ? trim($_REQUEST['user']) : '';

if(empty($search_user)){
	$search_user = $curr_id;
}

//database connection
require "../reusable_code/database_connection.php";

//User playlists
$sql_playlist = "SELECT * FROM avg_ratings_view ORDER BY rating DESC LIMIT 15;";

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

				<h3 class="white-text">Highly Rated Playlists</h3>
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
