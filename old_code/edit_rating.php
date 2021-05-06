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
<?php require "../reusable_code/menu.php";

$sql = "SELECT * from ratings_info_view WHERE rater_id =" . $_REQUEST["id"];

$results = $mysql->query($sql);

if(!$results) {
echo "<hr>Your SQL:<br>" . $sql . "<br><br>";
echo "SQL error: ". $mysql->error . "<hr>";
exit();
}


$recorddata = $results->fetch_assoc();
?>

<div class = "main-body center">
    <div class="column">
        <div class="column-content">

            <!--<div class="white-text">Div with white text</div>
            <div class="grey-text">Div with grey text</div>-->

            <form action="update_rating.php">
                <h1>Edit Rating</h1>

                <input type="hidden" name="raterid" value="<?php echo $recorddata["rater_id"];?>">
                Comment:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input style="width: 600px; height: 50px;"type="text" name="title" value="<?php echo $recorddata["comment"];?>"><br>


                Playlist Name:
                <select name="playlistname">
                    <option value="<?php echo $recorddata["playlist_id"] ?>">
                        <?php echo $recorddata["playlist_name"]; ?>
                    </option>
                    <!-- output ALL playlist options -->
                    <?php
                    $sql = "SELECT * FROM playlist";
                    $results = $mysql->query($sql);
                    while($currentrow = $results->fetch_assoc()){
                        echo "<option value='" . $currentrow["ID"] . "'>".
                            $currentrow["name"]. "</option>";
                    }
                    ?>
                </select>

                </select><br>

                User: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <select name="rater">
                    <option value="<?php echo $recorddata["rater_id"] ?>">
                        <?php echo $recorddata["rater_username"]; ?>
                    </option>
                    <!-- output ALL rating options -->
                    <?php
                    $sql = "SELECT * FROM users";
                    $results = $mysql->query($sql);
                    while($currentrow = $results->fetch_assoc()){
                        echo "<option value='" . $currentrow["ID"] . "'>".
                            $currentrow["username"]. "</option>";
                    }
                    ?>
                </select>

                <br>
                Rating:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


                <input style="width: 100px;"type="number" min="1" max="5" name="rating" value="<?php echo $recorddata["rating"] ?>">
                <br>
                <input type="submit" value="Save Edits">

            </form>

        </div>
    </div>
</div>

<?php require "../reusable_code/footer_files.php"; ?>
<?php require "../reusable_code/lightmode_files.php"; ?>

</body>
</html>

<!--<select name="rating">-->
<!--    <option value="--><?php //echo $recorddata["rating_id"] ?><!--">-->
<!--        --><?php //echo $recorddata["rating"]; ?>
<!--    </option>-->
<!--     output ALL rating options -->
<!--    <option>1</option>-->
<!--    <option>2</option>-->
<!--    <option>3</option>-->
<!--    <option>4</option>-->
<!--    <option>5</option>-->
<!--</select>-->