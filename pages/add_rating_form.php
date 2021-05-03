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

            <!--<div class="white-text">Div with white text</div>
            <div class="grey-text">Div with grey text</div>-->

            <form action="insert_rating.php">
                <h1>Add New Rating</h1>
                Playlist Name: <select name="playlistname">
                <?php
                $sql = "SELECT * FROM playlist";

                $results = $mysql ->query($sql);

                if(!$results){
                    echo "ERROR";
                    exit();
                }

                while($currentrow = $results->fetch_assoc()){
                    echo "<option value='" . $currentrow["ID"] . "'>" . $currentrow["name"] . "</option>";
                }

                ?>


                </select>


                <br>
                Rating:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <select name="rating">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>

                </select><br>
                Comment:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" name="comment"><br>
                <input type="submit">

            </form>

        </div>
    </div>
</div>

<?php require "../reusable_code/footer_files.php"; ?>
<?php require "../reusable_code/lightmode_files.php"; ?>

</body>
</html>
