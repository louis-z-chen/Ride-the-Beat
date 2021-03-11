<?php
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
}
?>

<!DOCTYPE html>
<html>

<head lang="en">
    <meta charset="UTF-8">
    <title>Acad276 Practical Exam: Search</title>
    <style>
        h1 {
            margin: auto;
            text-align: center;
            background-color:   #900;
            color:  #FC0;
        //            height: 60px;
            line-height: 60px;
        }
        h2 {
            margin: auto;
            text-align: center;
            padding:  30px;
        }
        .container {
            width:  400px;
            margin: auto;
            border: 1px solid red;
        }
        .left-col, .right-col {
            float:  left;
            width:  100%;
            height: 280px;
            border: 1px solid #990000;
        }

        .label, .input {
            float:  left;
            width:  130px;
            margin: 3px;
        }

        .label {
            margin-left: 40px;
        }

        .input>input, .input>select {
            width:  100%;
        }

        .search-submit {
            margin-top: 20px;
            margin-left: 170px;
            width:  80px;
        }
    </style>

</head>

<body>
<div class="container">

    <h1>Mobile Devices Database</h1>
    <div class="left-col">

        <h2>Search the Database</h2>
        <form method="get" action="results.php">
            <div class="label">Device Name:</div>
            <div class="input">
                <input type="text" name="device_name"/>
            </div>
            <br clear="all"/>

            <div class="label">Manufacturer :</div>
            <div class="input">
                <select name="manufacturer_id">
                    <option value='all'>All</option>
                    <?php
                    $sql = "SELECT * FROM manufacturers";

                    $results = $mysql->query($sql);

                    if(!$results) {
                        echo "SQL error: ". $mysql->error;
                        exit();
                    }
                    while($currentrow = $results->fetch_assoc()) {
                        echo "<option>" . $currentrow["manufacturer"]. "</option>";
                    }
                    ?>
                    </select>
            </div>
            <br clear="all"/>

            <div class="label">Operating System:</div>
            <div class="input">
                <select name="system_id">
                    <option value='all'>All</option>
                    <?php
                    $sql = "SELECT * FROM systems";

                    $results = $mysql->query($sql);

                    if(!$results) {
                        echo "SQL error: ". $mysql->error;
                        exit();
                    }
                    while($currentrow = $results->fetch_assoc()) {
                        echo "<option>" . $currentrow["system"]. "</option>";
                    }
                    ?>
                </select>

            </div>
            <br clear="all"/>

            <div class="label">Type:</div>
            <div class="input">
                <select name="type_id">
                    <option value='all'>All</option>
                    <?php
                    $sql = "SELECT * FROM types";

                    $results = $mysql->query($sql);

                    if(!$results) {
                        echo "SQL error: ". $mysql->error;
                        exit();
                    }
                    while($currentrow = $results->fetch_assoc()) {
                        echo "<option>" . $currentrow["type"]. "</option>";
                    }
                    ?>
                </select>

            </div>
            <br clear="all"/>

            <input class="search-submit" type="submit" value="Search"/>
        </form>
    </div>

    <br clear="all"/>

</div>

</body>

</html>