<?php
if(empty($_REQUEST["manufacturer_id"]) || empty($_REQUEST["system_id"]) || empty($_REQUEST["type_id"])) {
    echo "Missing drop-down values";
    exit();
}

$host = "webdev.iyaclasses.com";
$userid = "dent_guest";
$userpw = "Acad276_Dev2Ex@m";
$db = "dent_exam";

$mysql = new mysqli(
    $host,
    $userid,
    $userpw,
    $db
);

if($mysql->connect_errno) {
    echo "db connection error : " . $mysql->connect_error;
    exit();
} else {
    echo ""
    ;
}

$sql = " SELECT *
    FROM devices, manufacturers, systems, types
    WHERE
        devices.manufacturer_id = manufacturers.manufacturer_id AND 
        devices.system_id = systems.system_id AND 
        devices.type_id = types.type_id AND
        1=1 
    ";

if(!empty($_REQUEST["device_name"])){
    $sql .= "
    AND name LIKE '" . "%" . $_REQUEST["device_name"] . "%" . "'";
}

if($_REQUEST["manufacturer_id"] != "all"){
    $sql .= "
    AND manufacturer = '" . $_REQUEST["manufacturer_id"] . "'";
}

if($_REQUEST["system_id"] != "all"){
    $sql .= "
    AND system = '" . $_REQUEST["system_id"] . "'";
}

if($_REQUEST["type_id"] != "all"){
    $sql .= "
    AND type ='"  . $_REQUEST["type_id"] . "'";
}


$results = $mysql->query($sql);

if(!$results) {
    echo "SQL error: ". $mysql->error;
    exit();
}

?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Acad276 Practical Exam: Results</title>
    <style>
        .container {
            width:  600px;
            margin: auto;
        }
        h1 {
            margin: auto;
            text-align: center;
            background-color:   #900;
            color:  #FC0;
            height: 60px;
            line-height: 60px;
        }
        .num-results {
            margin: 20px 10px;
        }
        table {
            margin: auto;
            margin-bottom: 20px;
            width:  80%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #900;
            border-collapse: collapse;
            padding:    10px;
            text-align: center;
        }
        img {
            width: 100px;
        }
        .nav-link{
            margin: 10px 0px;
            font-size: 14px;
        }
    </style>
</head>

<body>
<div class="container">
    <h1>Mobile Device Database: Search Results</h1>
    <div class="nav-link">
        <a href="search.php"><< Back to Search Page</a>
    </div>

    <div class="num-results">
        Your search returned
        <strong>
            <?php
            echo $results->num_rows;
            ?>
        </strong>
        results.
    </div>

    <table>
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Manufacturer</th>
            <th>System</th>
            <th>Type</th>
        </tr>

        <?php
        while($currentrow = mysqli_fetch_array($results)) {
            ?>

            <tr>
                <td><a href="details.php?id='<?php echo $currentrow['device_id']; ?>'"> <?php  echo $currentrow['name']; ?></a></td>
                <td>
                    $<?php  echo $currentrow['price']; ?>
                </td>
                <td>
                    <?php  echo $currentrow['manufacturer']; ?>
                </td>
                <td>
                    <?php  echo $currentrow['system']; ?>
                </td>
                <td>
                    <?php  echo $currentrow['type']; ?>
                </td>

            </tr>

            <?php
        }
        ?>

    </table>

</div>
</body>
</html>