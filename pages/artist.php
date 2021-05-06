<?php
require "../reusable_code/login_logic.php";

$artist_id = "";
$artist_id = $_REQUEST["id"];

//if search is empty redirect
if(empty(trim($artist_id))){
  header("Location: home.php");
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

        <div id="artist_id" class="hidden">
          <?php echo $artist_id; ?>
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
