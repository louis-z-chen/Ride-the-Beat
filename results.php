<?php
session_start();

$search = "";
$search = $_REQUEST["search"];

print_r($search);

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

require "database_connection.php";

//Song_artist_view

/*
$sql_song = "SELECT * FROM song_artists_view WHERE song_name = ?;";
$statement_song = $mysqli->prepare($sql_song);
$statement_song->bind_param("s", $search);
$executed = $statement_song->execute();

if(!$executed) {
    echo $mysqli->error;
}

$result = $statement_song->get_result();
$song_row = $result -> fetch_assoc();

$song_count = $result->num_rows;
echo $song_count;

$statement_song->close();

//Artist table

//Playlist_users_view

//users table

$mysqli->close();
*/
?>

<!DOCTYPE html>
<html>
<head>
	<title>Ride the Beat</title>

	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/aef7737b1c.js" crossorigin="anonymous"></script>
	<link href= "styles.css" rel="stylesheet">

	<!--internal css for now until styles.css is finished -->
	<style>
	html, body{
		padding: 0;
		margin:0;
		height: 100%;
    background-color: white;
	}
	.main-body{
		width: 80%;
    background-color: lightgrey;
	}
	.center {
	  display: block;
	  margin-left: auto;
	  margin-right: auto;
	}
  .border-right {
    border-right: 1px solid black;
  }


	</style>

</head>
<body>
	<?php require "menu.php"; ?>

  <div class = "main-body center">

    <h2>Results</h2>
    Total Search Results

    <div class="container">
      <!--Database Seearch -->
      <div class="row">
        <!--Songs Column -->
        <div class="col-md">
          Songs
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Artist</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="col-md">
          Artists
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Mark</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="col-md">
          Playlists
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Creator</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="col-md">
          Users
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Username</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Mark</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

	</div>



	<!-- Required meta tags -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
