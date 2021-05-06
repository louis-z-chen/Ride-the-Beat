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

$sql = "SELECT * FROM ratings_info_view WHERE playlist_id =" . $_REQUEST["playlistid"];

$results = $mysql->query($sql);

if(!$results) {
    echo "<hr>Your SQL:<br>" . $sql . "<br><br>";
    echo "SQL error: ". $mysql->error . "<hr>";
    exit();
}

?>

<div class = "main-body center">
    <div class="column">
        <div class="column-content">

            <?php
            $row_cnt = $results->num_rows;

            if($row_cnt == 0){
                echo"<h4 style='color: white;'>These are no ratings for this playlist yet!</h4>";
            }
            else{
                echo "<h4 style='color: white;'>These are the ratings for this playlist:</h4>";
            }
            ?>

            <!--<div class="grey-text">Div with grey text</div>-->
            <div class="table-responsive-xl">
                <table class="table table-dark table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Username</th>
                        <th scope="col">Playlist Name</th>
                        ` <th scope="col">Rating</th>
                        <th scope="col">Comment</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $counter = 1;?>
                    <?php while($row = $results->fetch_assoc()) {?>
                        <tr>
                            <th scope="row"><?php echo $counter ?></th>
                            <?php $counter++;?>
                            <td><span id="rater_first_name<?php echo $row["playlistid"];?>"> <?php echo $row["rater_first_name"];?></span></td>
                            <td><span id="rater_last_name<?php echo $row["playlistid"];?>"> <?php echo $row["rater_last_name"];?></span></td>
                            <td><span id="rater_username<?php echo $row["playlistid"];?>"> <?php echo $row["rater_username"];?></span></td>
                            <td><span id="playlist_name<?php echo $row["playlistid"];?>"> <?php echo $row["playlist_name"];?></span></td>
                            <td><span id="rating<?php echo $row["playlistid"];?>"> <?php echo $row["rating"];?></span></td>
                            <td><span id="comment<?php echo $row["playlistid"];?>"> <?php echo $row["comment"];?></span></td>
                            </span>
                            </td>
                            <td align="center">
                                <button type="button"class="btn btn-outline-warning edit editbutton" value="<?php echo $row['rater_id']; ?>"><i class="far fa-edit"></i>
                                    <a style="text-decoration: none; color: inherit;" href = "edit_ratingNEW.php?ratingid=<?php echo $row['rating_id'];?>" >Edit</a>


                                </button>


                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <div>

                </div>
            </div>



        </div>
    </div>
</div>

<?php require "../reusable_code/footer_files.php"; ?>
<?php require "../reusable_code/lightmode_files.php"; ?>

</body>
</html>
