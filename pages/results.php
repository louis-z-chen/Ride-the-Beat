<?php
require "../reusable_code/login_logic.php";

$search = "";
$search = $_REQUEST["search"];

//if search is empty redirect
if(empty(trim($search))){
  header("Location: home.php");
  exit();
}

//results Count
$song_count = 0;
$artist_count = 0;
$playlist_count = 0;
$user_count = 0;

//database connection
require "../reusable_code/database_connection.php";

//Playlist Column
$sql_playlist = "SELECT * FROM playlist_info_view WHERE name LIKE '%" . $search . "%' ORDER BY name;";

$results_playlist= $mysqli->query($sql_playlist);

if(!$results_playlist){
  echo "SQL Error: " . $mysqli->error;
  exit();
}
$playlist_count = $results_playlist->num_rows;

//users Column
$sql_user = "SELECT * FROM users WHERE username LIKE '%" . $search . "%' ORDER BY username;";

$results_user = $mysqli->query($sql_user);

if(!$results_user){
  echo "SQL Error: " . $mysqli->error;
  exit();
}
$user_count = $results_user->num_rows;

$total_count = $song_count + $artist_count + $playlist_count + $user_count;

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

        <div id="search" class="hidden">
          <?php echo $search; ?>
        </div>

        <div class="center-text">
          <h1 class="white-text">Results for "<?php echo $search ?>"</h1>
          <input id="toggle-btn" type="checkbox" checked data-toggle="toggle" data-width="150" data-on="<i class='fab fa-spotify'></i> Spotify" data-off="<i class='fas fa-database'></i> Database" data-onstyle="success" data-offstyle="info">
        </div>
        <br>
        <div id="spotify-results" class="spotify-results">

          <!--songs -->
  				<div id="song-list" class="song-list d-flex flex-row flex-wrap"></div>

        </div>

        <div id="database-results"class="database-results">
          <div class="center-text">
            <div class="grey-text">Total Search Results: <?php echo $total_count ?></div>
          </div>

          <div class="container">
            <!--Database Seearch -->
            <div class="row">
              <!--Playlist Column -->
              <div class="col-md">
                <div class = "center-text">
                  <div class="white-text"><strong>Playlists</strong> <br></div>
                  <div class="grey-text"><?php echo $playlist_count ?> playlist results</div>
                </div>
                <table class="table table-dark table-hover">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Playlist Name</th>
                      <th scope="col">Creator</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $playlist_results_counter = 1;?>
                    <?php while($row = $results_playlist->fetch_assoc() ) : ?>
                      <tr>
                      <th scope="row"><?php echo $playlist_results_counter ?></th>
                      <?php $playlist_results_counter++;?>
                      <td> <a href="../pages/playlist.php?id=<?php echo $row["playlist_id"]?>" class="link-name-white" target="_blank"><?php echo $row["name"] ?></a> </td>
                      <td> <a href="../pages/user_playlist.php?user=<?php echo $row["creator_id"] ?>" class="link-name-white" target="_blank"><?php echo $row["creator_first_name"] ?> <?php echo $row["creator_last_name"] ?></a> </td>
                    </tr>
                    <?php endwhile; ?>
                  </tbody>
                </table>
              </div>
              <!--User Column -->
              <div class="col-md">
                <div class = "center-text">
                  <div class="white-text"><strong>Users</strong><br></div>
                  <div class="grey-text"><?php echo $user_count ?> username results</div>
                </div>
                <table class="table table-dark table-hover">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Username</th>
                        <th scope="col">Name</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $user_results_counter = 1;?>
                    <?php while($row = $results_user->fetch_assoc() ) : ?>
                    <tr>
                      <th scope="row"><?php echo $user_results_counter ?></th>
                      <?php $user_results_counter++;?>
                      <td> <a href="../pages/user_playlist.php?user=<?php echo $row["ID"] ?>" class="link-name-white" target="_blank"><?php echo $row["username"] ?></a> </td>
                      <td> <?php echo $row["first_name"] ?> <?php echo $row["last_name"] ?></td>
                    </tr>
                    <?php endwhile; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>


	<?php require "../reusable_code/footer_files.php"; ?>
  <?php require "../reusable_code/lightmode_files.php"; ?>
  <script src = "../javascript_files/refresh_token.js"></script>
  <script src = "../javascript_files/results.js"></script>

</body>
</html>
