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

//Song column
$sql_song = "SELECT * FROM song WHERE name LIKE '%" . $search . "%' ORDER BY name;";

$results_song = $mysqli->query($sql_song);

if(!$results_song){
  echo "SQL Error: " . $mysqli->error;
  exit();
}
$song_count = $results_song->num_rows;

//Artist column
$sql_artist = "SELECT * FROM artist WHERE name LIKE '%" . $search . "%' ORDER BY name;";

$results_artist= $mysqli->query($sql_artist);

if(!$results_artist){
  echo "SQL Error: " . $mysqli->error;
  exit();
}
$artist_count = $results_artist->num_rows;

//Playlist Column
$sql_playlist = "SELECT * FROM playlist WHERE name LIKE '%" . $search . "%' ORDER BY name;";

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

  <div class = "main-body center results-main">

    <div class="center-text">
      <h2>Results for "<?php echo $search ?>"</h2>
      Total Search Results: <?php echo $total_count ?>
    </div>
    <br>

    <div class="container">
      <!--Database Seearch -->
      <div class="row">
        <!--Songs Column -->
        <div class="col-md">
          <div class = "center-text">
            <strong>Songs</strong> <br>
            <?php echo $song_count ?> song results
          </div>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Song Name</th>
              </tr>
            </thead>
            <tbody>
              <?php $song_results_counter = 1;?>
              <?php while($row = $results_song->fetch_assoc() ) : ?>
                <tr>
                <th scope="row"><?php echo $song_results_counter ?></th>
                <?php $song_results_counter++;?>
                <td> <?php echo $row["name"] ?> </td>
              </tr>
              <?php endwhile; ?>
            </tbody>
          </table>
        </div>
        <!--Artist Column -->
        <div class="col-md">
          <div class = "center-text">
            <strong>Artists</strong> <br>
            <?php echo $artist_count ?> artist results
          </div>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Artist Name</th>
              </tr>
            </thead>
            <tbody>
              <?php $artist_results_counter = 1;?>
              <?php while($row = $results_artist->fetch_assoc() ) : ?>
                <tr>
                <th scope="row"><?php echo $artist_results_counter ?></th>
                <?php $artist_results_counter++;?>
                <td> <?php echo $row["name"] ?> </td>
              </tr>
              <?php endwhile; ?>
            </tbody>
          </table>
        </div>
        <!--Playlist Column -->
        <div class="col-md">
          <div class = "center-text">
            <strong>Playlists</strong> <br>
            <?php echo $playlist_count ?> playlist results
          </div>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Playlist Name</th>
              </tr>
            </thead>
            <tbody>
              <?php $playlist_results_counter = 1;?>
              <?php while($row = $results_playlist->fetch_assoc() ) : ?>
                <tr>
                <th scope="row"><?php echo $playlist_results_counter ?></th>
                <?php $playlist_results_counter++;?>
                <td> <?php echo $row["name"] ?> </td>
              </tr>
              <?php endwhile; ?>
            </tbody>
          </table>
        </div>
        <!--User Column -->
        <div class="col-md">
          <div class = "center-text">
            <strong>Users</strong><br>
            <?php echo $user_count ?> username results
          </div>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Username</th>
              </tr>
            </thead>
            <tbody>
              <?php $user_results_counter = 1;?>
              <?php while($row = $results_user->fetch_assoc() ) : ?>
                <tr>
                <th scope="row"><?php echo $user_results_counter ?></th>
                <?php $user_results_counter++;?>
                <td> <?php echo $row["username"] ?> </td>
              </tr>
              <?php endwhile; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

	</div>

	<?php require "../reusable_code/footer_files.php"; ?>

</body>
</html>