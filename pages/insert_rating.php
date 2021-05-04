<?php

require "../reusable_code/login_logic.php";

// if not an admin
if ($curr_security_level < 2) {
    header('Location: ../pages/home.php');
    exit();
}

if($_REQUEST["comment"] == ''){
    echo "ERROR. Please go back and type in a comment";
    exit();
}

if ($_REQUEST["rating"] == '') {
    echo "ERROR. How did you get here with no rating";
    exit();
}

if ($_REQUEST["playlistname"] == '') {
    echo "ERROR. How did you get here with no playlist";
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

if ($mysql->connect_errno) {
    echo "db connection error : " . $mysql->connect_error;
    exit();
}


print_r($_REQUEST);



//insert a new rating
$sql = "INSERT INTO playlist_ratings
    (playlist_id, rater_id, rating, comment)
    VALUES
        (" . $_REQUEST["playlistname"] . ", " . $_REQUEST["rater"] . ", ". $_REQUEST["rating"] . " , '". $_REQUEST["comment"]. "')
";

$results = $mysql->query($sql);

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

                <?php
                if(!$results) {
                    echo "SQL problem: " .
                        $mysql->error ;
                    exit();
                }

                echo "Your comment was added: <br><br>'" . $_REQUEST["comment"] . "'";


                ?>


            </div>
            <!--<div class="grey-text">Div with grey text</div>-->

        </div>
    </div>
</div>

<?php require "../reusable_code/footer_files.php"; ?>
<?php require "../reusable_code/lightmode_files.php"; ?>

</body>
</html>


