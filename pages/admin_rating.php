<?php
//exit("hello");
require "../reusable_code/login_logic.php";

// if not an admin
if($curr_security_level < 2){
    header('Location: ../pages/home.php');
    exit();
}

//database connection
require "../reusable_code/database_connection.php";

//declare variables
$rater_first_name = "%%";
$rater_last_name = "%%";
$rater_username = "%%";
$playlist_name = "%%";
$comment = "%%";


//define how many table rows per pages
$results_per_page = 10;

//find out the number of results stored in the database_connection
//$sql = "SELECT * FROM ratings_info_view WHERE rater_first_name LIKE ? AND rater_last_name LIKE ? AND rater_username LIKE ? AND playlist_name LIKE ? AND comment LIKE ?;";
//$statement = $mysqli->prepare($sql);
//$statement->bind_param('sssss', $rater_first_name, $rater_last_name, $rater_username, $playlist_name, $comment);
//$executed = $statement->execute();
$sql = "SELECT * FROM playlist";
//echo $sql;
$results = $mysqli->query($sql);
if(!$results){
    echo "hello" . $mysqli->error;
    exit();
}


// if(!$executed) {
//     echo $mysqli->error;
// }

// $results = $statement->get_result();
$number_of_results = (int)$results->num_rows;

// $statement->close();

//determine number of total pages available
$number_of_pages = ceil($number_of_results/$results_per_page);

//determine which page number visitor is currently on
if(!isset($_REQUEST['page'])){
    $page = 1;
}
else {
    $page = $_REQUEST['page'];
}

//determine the sql LIMIT starting number for the results on the displaying page
$this_page_first_result = ($page-1)*$results_per_page;

//retrieve selected results from database
//search prepared statement
// $sql_search = "SELECT * FROM ratings_info_view WHERE rater_first_name LIKE ? AND rater_last_name LIKE ? AND rater_username LIKE ? AND playlist_name LIKE ? AND comment LIKE ? ORDER BY playlist_name DESC, rater_first_name LIMIT ?, ?;";
// $statement_search = $mysqli->prepare($sql_search);
// $statement_search->bind_param('sssssii', $rater_first_name, $rater_last_name, $rater_username, $playlist_name, $comment, $this_page_first_result, $results_per_page);
// $executed_search = $statement_search->execute();

// if(!$executed_search) {
//     echo $mysqli->error;
// }

// $results = $statement_search->get_result();
// $curr_result_count = $results->num_rows;
//
// $statement_search->close();
//
// $mysqli->close();

//display the links to the pages
//always showing 3 pages and numbers change to reflect that
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ride the Beat</title>

    <?php require "../reusable_code/header_files.php"; ?>

    <!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
            $(document).ready(function(){
                $(".editbutton").click(function(){
                    console.log("yes");
                    location.href = "edit_rating.php?id=" + $(this).value;
                });
            });
        </script>-->

</head>
<body>
<?php require "../reusable_code/menu.php"; ?>

<div class = "main-body center">
    <div class="column">
        <div class="column-content">

            <h1 class="white-text center-text"><i class="fas fa-users"></i> User Ratings</h1>

            <!--table-->
            <div class="row">
                <div class="col-6">
                    <h2 class="white-text">Manage Ratings</h2>
                    <div class="white-text">Click on "see ratings" to see ratings for that specific playlist</div>
                </div>
                <div class="col-6" align="right">
                    <!--<a href="#add_user" class="btn btn-success" data-toggle="modal"><i class="fas fa-user-plus"></i> <span> Add New User</span></a>-->
                    <button type="button" id="TESTBUTTON" class="btn btn-success add"><i class="fas fa-user-plus"></i> Add Rating</button>

                    <script type="text/javascript">
                        document.getElementById("TESTBUTTON").onclick = function () {
                            location.href = "add_rating_form.php";
                        };
                    </script>

                </div>
            </div>

            <div class="table-responsive-xl">
                <table class="table table-dark table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Playlist Name</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $counter = $this_page_first_result + 1;?>
                    <?php while($row = $results->fetch_assoc()) {?>
                        <tr>
                            <th scope="row"><?php echo $counter ?></th>
                            <?php $counter++;?>
                            <td><span id="playlist_name<?php echo $row["ID"];?>"> <?php echo $row["name"];?></span></td>
                            </span>
                            </td>
                            <td align="center">
                                <button type="button"class="btn btn-outline-warning edit editbutton" value="<?php echo $row['ID']; ?>"><i class="far fa-edit"></i>
                                    <a style="text-decoration: none; color: inherit;" href = "results_ratings.php?playlistid=<?php echo $row['ID'];?>" >See Ratings</a>


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
<!--<script src = "../javascript_files/admin_rating.js"></script>-->
</body>
</html>
