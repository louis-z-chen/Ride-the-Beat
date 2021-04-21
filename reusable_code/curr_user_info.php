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

$curr_id = $logged_in_id;
$curr_first = $row["first_name"];
$curr_last = $row["last_name"];
$curr_email = $row["email"];
$curr_username = $row["username"];
$curr_security_level = $row["security_level"];
$curr_access = $row["spotify_access"];
$curr_refresh = $row["spotify_refresh"];

$statement->close();
$mysqli->close();
?>
