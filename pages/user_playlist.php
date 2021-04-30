<?php
require "../reusable_code/login_logic.php";

$search_user = isset($_REQUEST['user']) ? trim($_REQUEST['user']) : '';

if(empty($search_user)){
	$search_user = $curr_id;
}

//database connection
require "../reusable_code/database_connection.php";

//get user's name
$sql_user = "SELECT * FROM users WHERE ID =" . $search_user . ";";

$results_user = $mysqli->query($sql_user);

if(!$results_user){
  echo "SQL Error: " . $mysqli->error;
  exit();
}

$user_row = $results_user->fetch_assoc();
$fname = $user_row['first_name'];
$lname = $user_row['last_name'];
$name = $fname . " " . $lname;

//User playlists
$sql_playlist = "SELECT * FROM playlist WHERE creator_id =" . $search_user . " ORDER BY name;";

$results_playlist = $mysqli->query($sql_playlist);

if(!$results_playlist){
  echo "SQL Error: " . $mysqli->error;
  exit();
}
$playlist_count = $results_playlist->num_rows;

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

				<!--Row 1 -->
				<div class="white-text">
					<br>
					USER
					<h1><?php echo $name; ?></h1>
				</div>
				<hr class="white-line">

				<!--Row 2 -->
				<h4 class="row-title white-text"><?php echo $playlist_count; ?> PUBLIC PLAYLISTS</h4>
				<div class="d-flex flex-row flex-wrap">
					<?php while($row = $results_playlist->fetch_assoc() ) : ?>
						<div class="spot-container p-2">
							<a href="../pages/playlist.php?id=<?php echo $row['ID']; ?>">
								<img src="<?php echo $row['image_url']; ?>" class="playlist-pic"/>
							</a>
							<div class="spot-title white-text center-text"><?php echo $row['name']; ?></div>
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
