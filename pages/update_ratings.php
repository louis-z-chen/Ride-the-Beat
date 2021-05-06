<?php

require "../reusable_code/login_logic.php";

// if not an admin
if($curr_security_level < 2){
    header('Location: ../pages/home.php');
    exit();
}

//database connection
$host = "webdev.iyaclasses.com";
$user = "chenloui_guest";
$cpanelpassword = "ridethebeat!";
$db = "chenloui_ridethebeat";

$mysql = new mysqli(
    $host,
    $user,
    $cpanelpassword,
    $db
);

if($mysql->connect_errno) {
    echo "db connection error : " . $mysql->connect_error;
    exit();
}

?>


<?php
require "../reusable_code/login_logic.php";
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


            <?php
            $sql = "UPDATE playlist_ratings
        SET 
            playlist_id=" . $_REQUEST["playlistname"] . ",
            rater_id=" . $_REQUEST["rater"] .",
            comment='" . $_REQUEST["comment"] ."',
            rating=" . $_REQUEST["rating"] .
                " WHERE ID=" . $_REQUEST["ratingid"];



            $results = $mysql->query($sql);

            if(!$results) {
                echo "<hr>Your SQL:<br>" . $sql . "<br><br>";
                echo "SQL error: ". $mysql->error . "<hr>";
                exit();
            }
            else{
                echo "Your rating " . $_REQUEST["rating"] . " and comment: '". $_REQUEST["comment"]. "' were updated!";
            }

            ?>

        </div>
    </div>
</div>

<?php require "../reusable_code/footer_files.php"; ?>
<?php require "../reusable_code/lightmode_files.php"; ?>

</body>
</html>
