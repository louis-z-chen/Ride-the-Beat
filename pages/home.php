<?php
require "../reusable_code/login_logic.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Ride the Beat</title>

	<?php require "../reusable_code/header_files.php"; ?>

<style>

/*row title*/
@media(max-width:320px) {
.column-info {
	font-size: 20px;
	word-break: break-all;
}

.column-title {
	font-size: 20px;
	word-break: break-all;
}

.bannertext {
	font-size: 30px;
	word-break: break-all;
}
}

@media(max-width:767px) {
  .row-title {
    font-size: 20px;
    word-break: break-all;
  }

.column-info {
	font-size: 15px;
	word-break: break-all;
}

.column-title {
	font-size: 15px;
	word-break: break-all;
}

.bannertext {
	font-size: 30px;
	word-break: break-all;
}
}

@media(max-width:1000px) {
  .row-title {
    font-size: 20px;
    word-break: break-all;
  }

.column-info {
	font-size: 15px;
	word-break: break-all;
}

  .column-title {
    font-size: 15px;
    word-break: break-all;
  }

.bannertext {
	font-size: 30px;
	word-break: break-all;
}
}


@media(max-width:1200px) {
  .column-title {
    font-size: 15px;
    word-break: break-all;
  }

.column-info {
	font-size: 15px;
	word-break: break-all;
}

.bannertext {
	font-size: 30px;
	word-break: break-all;
}
}


</style>
</head>
<body>
	<?php require "../reusable_code/menu.php"; ?>

  <div class = "main-body center">

    <div class="row">
      <!--Page Content column -->
      <div class="col-xl-9 main-column-container">
        <div class = "column">
          <div class = "column-content">
            <!--Left box is split into 3 rows -->

            <!--Row 1 -->
            <div class="content-row">
              <div class="left-banner white-text">
                <h5 class="bannertext">//TRENDING</h5>
                <h5 class="bannertext">Free Spirit</h5>
                <h5 class="bannertext">- Khalid</h5>
              </div>
            </div>

						<div class= "welcome-message">
							<h2 class= "white-text">Welcome <?php echo $curr_first ?>!</h2>
						</div>

            <!--Row 2 -->
            <div class="content-row picture-row">
              <h4 class="row-title white-text">Artist Spotlight</h4>
              <div class="row">
                <div class="col-md">
                  <div class="row-column">
                    <img src="../images/Jake2.jpg" class="column-pic"/>
                    <div class="column-title white-text">Jake Hope</div>
                    <div class="column-info grey-text">Pop</div>
                  </div>
                </div>
                <div class="col-md">
									<div class="row-column">
                    <img src="../images/Jake2.jpg" class="column-pic"/>
                    <div class="column-title white-text">Jake Hope</div>
                    <div class="column-info grey-text">Pop</div>
                  </div>
                </div>
                <div class="col-md">
									<div class="row-column">
                    <img src="../images/Jake2.jpg" class="column-pic"/>
                    <div class="column-title white-text">Jake Hope</div>
                    <div class="column-info grey-text">Pop</div>
                  </div>
                </div>
                <div class="col-md">
									<div class="row-column">
                    <img src="../images/Jake2.jpg" class="column-pic"/>
                    <div class="column-title white-text">Jake Hope</div>
                    <div class="column-info grey-text">Pop</div>
                  </div>
                </div>
                <div class="col-md">
									<div class="row-column">
                    <img src="../images/Jake2.jpg" class="column-pic"/>
                    <div class="column-title white-text">Jake Hope</div>
                    <div class="column-info grey-text">Pop</div>
                  </div>
                </div>
                <div class="col-md">
									<div class="row-column">
                    <img src="../images/Jake2.jpg" class="column-pic"/>
                    <div class="column-title white-text">Jake Hope</div>
                    <div class="column-info grey-text">Pop</div>
                  </div>
                </div>
              </div>
							
            </div>

            <!--Row 3 -->
						<div class="content-row picture-row">
              <h4 class="row-title white-text">Artist Spotlight</h4>
              <div class="row">
                <div class="col-md">
                  <div class="row-column">
                    <img src="../images/Jake2.jpg" class="column-pic"/>
                    <div class="column-title white-text">Jake Hope</div>
                    <div class="column-info grey-text">Pop</div>
                  </div>
                </div>
                <div class="col-md">
									<div class="row-column">
                    <img src="../images/Jake2.jpg" class="column-pic"/>
                    <div class="column-title white-text">Jake Hope</div>
                    <div class="column-info grey-text">Pop</div>
                  </div>
                </div>
                <div class="col-md">
									<div class="row-column">
                    <img src="../images/Jake2.jpg" class="column-pic"/>
                    <div class="column-title white-text">Jake Hope</div>
                    <div class="column-info grey-text">Pop</div>
                  </div>
                </div>
                <div class="col-md">
									<div class="row-column">
                    <img src="../images/Jake2.jpg" class="column-pic"/>
                    <div class="column-title white-text">Jake Hope</div>
                    <div class="column-info grey-text">Pop</div>
                  </div>
                </div>
                <div class="col-md">
									<div class="row-column">
                    <img src="../images/Jake2.jpg" class="column-pic"/>
                    <div class="column-title white-text">Jake Hope</div>
                    <div class="column-info grey-text">Pop</div>
                  </div>
                </div>
                <div class="col-md">
									<div class="row-column">
                    <img src="../images/Jake2.jpg" class="column-pic"/>
                    <div class="column-title white-text">Jake Hope</div>
                    <div class="column-info grey-text">Pop</div>
                  </div>
                </div>
              </div>
            </div>

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
	<?php require "../reusable_code/lightmode_files.php"; ?>

</body>
</html>
