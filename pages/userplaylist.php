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

            <!--Row 1 -->
            <div class="row">
              <div class="col-3">
              <img src="../images/ProfilePic.png" class="profile-pic"/>
              </div>
              <div class="col-9 white-text"><br /><br />
              USER
              <h1>Menna Elamroussy</h1>
              </div>
            </div>
<hr />
            <!--Row 2 -->
            <div class="content-row picture-row">
              <h4 class="row-title white-text">PUBLIC PLAYLISTS</h4>
              <div class="row">
                <div class="col-md">
                  <div class="row-column">
                    <img src="../images/playlist1.jpg" class="playlist-pic"/>
                    <div class="column-title white-text">My Typical Jams</div>
                    <div class="column-info grey-text">0 followers</div>
                  </div>
                </div>
                <div class="col-md">
                  <div class="row-column">
                    <img src="../images/playlist2.png" class="playlist-pic"/>
                    <div class="column-title white-text">2018 Bops</div>
                    <div class="column-info grey-text">15 followers</div>
                  </div>
                </div>
                <div class="col-md">
                  <div class="row-column">
                    <img src="../images/playlist3.jpg" class="playlist-pic"/>
                    <div class="column-title white-text">I'm Texan</div>
                    <div class="column-info grey-text">3 followers</div>
                  </div>
                </div>
                <div class="col-md">
                  <div class="row-column">
                    <img src="../images/playlist4.jpg" class="playlist-pic"/>
                    <div class="column-title white-text">Chill Hits</div>
                    <div class="column-info grey-text">100 followers</div>
                  </div>
                </div>
              </div>
            </div> <!-- Close Row 2 -->

            <!--Row 3 -->
            <div class="content-row picture-row">
              <div class="row">
                <div class="col-md">
                  <div class="row-column">
                    <img src="../images/playlist5.jpg" class="playlist-pic"/>
                    <div class="column-title white-text">Childhood Classics</div>
                    <div class="column-info grey-text">12 followers</div>
                  </div>
                </div>
                <div class="col-md">
                  <div class="row-column">
                    <img src="../images/playlist6.jpg" class="playlist-pic"/>
                    <div class="column-title white-text">Vibes</div>
                    <div class="column-info grey-text">21 followers</div>
                  </div>
                </div>
                <div class="col-md">
                  <div class="row-column">
                    <img src="../images/playlist7.jpg" class="playlist-pic"/>
                    <div class="column-title white-text">Trippy</div>
                    <div class="column-info grey-text">7 followers</div>
                  </div>
                </div>
                <div class="col-md">
                  <div class="row-column">
                    <img src="../images/playlist8.jpg" class="playlist-pic"/>
                    <div class="column-title white-text">Feels</div>
                    <div class="column-info grey-text">54 followers</div>
                  </div>
                </div>
              </div>
            </div> <!-- Close Row 3 -->

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

	</div> <!-- close main-body center -->

	<?php require "../reusable_code/footer_files.php"; ?>
	<?php require "../reusable_code/lightmode_files.php"; ?>

</body>
</html>
