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

    <div class="row">
      <!--Page Content column -->
      <div class="col-xl-9 main-column-container">
        <div class = "column">
          <div class = "column-content">

              Put Stuff Here

          </div>
        </div>
      </div>
      <!--Music player and lyrics column -->
      <div class="col-xl-3 main-column-container">
        <div class = "column">
          <div class = "column-content">
            <?php require "../reusable_code/music_player.php";?>
          </div>
        </div>
      </div>
    </div>

	</div>

	<?php require "../reusable_code/footer_files.php"; ?>

</body>
</html>
