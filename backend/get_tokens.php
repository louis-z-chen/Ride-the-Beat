<?php
session_start();

//if logged in, get account information
$logged_in_id = $_SESSION["id"];

require "../reusable_code/database_connection.php";

//get existing username, email, and security level
$sql_prepared = "SELECT * FROM users WHERE ID = ?;";
$statement = $mysqli->prepare($sql_prepared);
$statement->bind_param("i", $logged_in_id);
$executed = $statement->execute();

if(!$executed) {
  echo $mysqli->error;
}

$result = $statement->get_result();
$row = $result -> fetch_assoc();

$curr_access = $row["spotify_access"];
$curr_refresh = $row["spotify_refresh"];

$statement->close();
$mysqli->close();

echo json_encode(
  array(
    'refresh' => $curr_refresh,
    'access' => $curr_access
  )
);
?>
