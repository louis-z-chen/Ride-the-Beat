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

//User playlists
$sql_playlist = "SELECT * FROM playlist_info_view WHERE playlist_id =" . $playlist_id . ";";

$results_playlist = $mysqli->query($sql_playlist);

if(!$results_playlist){
  echo "SQL Error: " . $mysqli->error;
  exit();
}
$row = $results_playlist->fetch_assoc();

//Get comments
$sql_comments = "SELECT * FROM ratings_info_view WHERE playlist_id =" . $playlist_id . ";";

$results_comments = $mysqli->query($sql_comments);

if(!$results_comments){
  echo "SQL Error: " . $mysqli->error;
  exit();
}
$numrows_results_comments = $results_comments->num_rows;

$mysqli->close();

$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
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
              Created by <a href="../pages/user_playlist.php?user=<?php echo $row['creator_id'];?>" class="link-name" target="_blank"><?php echo $row['username'];?></a>
              (<?php echo $row['creator_first_name'];?> <?php echo $row['creator_last_name'];?>)
            </div>
            <?php
              if($numrows_results_avg == 0){
                echo "This playlist has not been rated yet";
              }
              else{
                echo "Average Rating : ";
                $avg_rating = round($row_avg["rating"] * 2) / 2;
                for($i = 0; $i <= 4; $i++){
                  if($avg_rating == 0){
                    echo "<i class='far fa-star'></i>";
                  }
                  else if(($avg_rating - 1) >= 0){
                    echo "<i class='fas fa-star'></i>";
                    $avg_rating = $avg_rating - 1;
                  }
                  else{
                    echo "<i class='fas fa-star-half-alt'></i>";
                    $avg_rating = $avg_rating - 0.5;
                  }
                }
                echo " (" . $row_avg["rating"] . ") ";
              }
            ?>
            <br>
            <?php
              if($numrows_results_rating == 0){
                echo "You have not rated this playlist yet";
              }
              else{
                echo "Your Rating : ";
                $user_rating = round($row_rating["rating"] * 2) / 2;
                for($i = 0; $i <= 4; $i++){
                  if($user_rating == 0){
                    echo "<i class='far fa-star'></i>";
                  }
                  else if(($user_rating - 1) >= 0){
                    echo "<i class='fas fa-star'></i>";
                    $user_rating = $user_rating - 1;
                  }
                  else{
                    echo "<i class='fas fa-star-half-alt'></i>";
                    $user_rating = $user_rating - 0.5;
                  }
                }
                echo " (" . $row_rating["rating"] . ") ";
              }
            ?>
            <br>
            <br>
            <button type="button" class="btn btn-success mr-2 green-button rate"><i class="fas fa-thumbs-up"></i> Rate</button>
            <button type="button" class="btn btn-success mr-2 green-button share"><i class="fas fa-envelope"></i> Share</button>
            <a class="btn btn-success mr-2 green-button" href="<?php echo $row['url'];?>" role="button" target="_blank"><i class="fab fa-spotify"></i> Spotify</a>
          </div>
        </div>

        <div class="text-center display_message">
          <i><?php echo $_REQUEST["hidden_message"]; ?></i>
        </div>

				<hr class="white-line">
        <div class="white-text">
          Some songs from this playlist
        </div>

				<!--songs -->
				<div id="song-list" class="song-list d-flex flex-row flex-wrap"></div>
        <br>

        <!--comments-->
        <h3 class="white-text">
          <?php echo $numrows_results_comments;?>
          <?php
            if($numrows_results_comments == 1){
              echo " Comment";
            }
            else{
              echo " Comments";
            }
          ?>
        </h3>
        <div class="table-responsive-xl">
          <table class="table table-dark table-hover table-fixed">
            <thead>
              <tr>
                <td scope="col" class="w-25">User</td>
                <td scope="col" class="w-25">Rating</td>
                <td scope="col" class="w-50">Comment</td>
              </tr>
            </thead>
            <tbody>
              <?php if($numrows_results_comments != 0){ ?>
                <?php while($row_comments = $results_comments->fetch_assoc()) : ?>

                  <tr>
                    <td>
                      <?php echo $row_comments['rater_first_name'];?> <?php echo $row_comments['rater_last_name'];?>
                      <a href="../pages/user_playlist.php?user=<?php echo $row_comments['rater_id'];?>" class="link-name" target="_blank">(<?php echo $row_comments['rater_username'];?>)</a>
                    </td>
                    <td class="td-class"><?php echo $row_comments['rating'];?></td>
                    <td class="td-class"><?php echo $row_comments['comment'];?></td>
                  </tr>

                <?php endwhile; ?>
              <?php } ?>
            </tbody>
          </table>
        </div>

			</div>

      <!-- hidden form to display messages -->
      <div class="hidden">
        <form method="POST" action="<?php echo $url;?>" id="hidden_form">
          <div class="form-group">
            <input type="text" class="form-control" id="hidden_message" name="hidden_message">
          </div>
        </form>
      </div>

      <!-- hidden form to store user's ratings and comment -->
      <div class="hidden">
        <form method="POST" action="" id="hidden_info_form">
          <div class="form-group">
            <input type="text" class="form-control" id="hidden_rating" value="<?php echo $row_rating['rating'];?>">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="hidden_comment" value="<?php echo $row_rating['comment'];?>">
          </div>
        </form>
      </div>

      <!-- Rate Modal HTML -->
      <div id="rate" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <form>
              <div class="modal-header">
                <h4 class="modal-title">Rate This Playlist</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              </div>
              <div class="modal-body">
                <ul class="form-messages" id="rate_errors"></ul>
                <div class="form-group">
                  <input type="hidden" class="form-control" id="rate_playlist_id" value="<?php echo $playlist_id;?>">
                </div>
                <div class="form-group">
                  <input type="hidden" class="form-control" id="rate_rater_id" value="<?php echo $row_rating['rater_id'];?>">
                </div>
                <div class="form-group">
                  <input type="hidden" class="form-control" id="rate_rating_id" value="<?php echo $row_rating['rating_id'];?>">
                </div>
                <div class="form-group">
                  <label>Rating</label>
                  <select class="form-control" id="rating">
                    <option value = "5" selected>5</option>
                    <option value = "4">4</option>
                    <option value = "3">3</option>
                    <option value = "2">2</option>
                    <option value = "1">1</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Comment</label>
                  <input type="text" class="form-control" id="comment">
                </div>
              </div>
              <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                <input type="submit" class="btn btn-success" id="rate-btn" value="Rate">
              </div>
            </form>
          </div>
        </div>
      </div> <!-- end of rate modal -->

      <!-- Share Modal HTML -->
      <div id="share" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <form>
              <div class="modal-header">
                <h4 class="modal-title">Email This Playlist</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              </div>
              <div class="modal-body">
                <ul class="form-messages" id="share_errors"></ul>
                <div class="form-group">
                  <input type="hidden" class="form-control" id="url" value="<?php echo $url;?>">
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control" id="email">
                </div>
                <div class="form-group">
                  <label>Message</label>
                  <input type="text" class="form-control" id="message">
                </div>
              </div>
              <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                <input type="submit" class="btn btn-success" id="share-btn" value="Send">
              </div>
            </form>
          </div>
        </div>
      </div> <!-- end of share modal -->

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
	<script src="../javascript_files/playlist.js"></script>

</body>
</html>
