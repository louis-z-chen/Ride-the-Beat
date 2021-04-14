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
              <img src="../images/playlist1.jpg" class="profile-pic"/>
              </div>
              <div class="col-9 white-text">
              PLAYLIST
              <h1>My Typical Jams</h1>
              Created by Menna Elamroussy - 15 songs
              <button class="nav-link btn btn-success navbar-btn ml green-btn" id="lightmode" style="margin-top: 7px;">Play</button>
              </div>

            </div>
<hr />
            <!--Row 2 -->
            <div class="content-row picture-row">
              <div class="row">
                <div class="col-md">
                  <div class="row-column">
                    <img src="../images/songs/Song1.jpg" class="playlist-pic"/>
                    <div class="column-title white-text">Do I Wanna Know?</div>
                    <div class="column-info grey-text">Artic Monkeys</div>
                  </div>
                </div>
                <div class="col-md">
                  <div class="row-column">
                    <img src="../images/songs/Song2.png" class="playlist-pic"/>
                    <div class="column-title white-text">Stuck With U (with Justin Bieber)</div>
                    <div class="column-info grey-text">Ariana Grande, Justin Bieber</div>
                  </div>
                </div>
                <div class="col-md">
                  <div class="row-column">
                    <img src="../images/songs/Song3.jpg" class="playlist-pic"/>
                    <div class="column-title white-text">Cigarettes on Patios</div>
                    <div class="column-info grey-text">BabyJake</div>
                  </div>
                </div>
                <div class="col-md">
                  <div class="row-column">
                    <img src="../images/songs/Song4.png" class="playlist-pic"/>
                    <div class="column-title white-text">CITY OF ANGELS</div>
                    <div class="column-info grey-text">24KGoldn</div>
                  </div>
                </div>
                <div class="col-md">
                  <div class="row-column">
                    <img src="../images/songs/Song5.jpg" class="playlist-pic"/>
                    <div class="column-title white-text">Breezeblocks</div>
                    <div class="column-info grey-text">alt-J</div>
                  </div>
                </div>

              </div>
            </div> <!-- Close Row 2 -->

            <!--Row 3 -->
            <div class="content-row picture-row">
              <div class="row">
                <div class="col-md">
                  <div class="row-column">
                    <img src="../images/songs/Song6.png" class="playlist-pic"/>
                    <div class="column-title white-text">Vienna</div>
                    <div class="column-info grey-text">Billy Joel</div>
                  </div>
                </div>
                <div class="col-md">
                  <div class="row-column">
                    <img src="../images/songs/Song7.jpg" class="playlist-pic"/>
                    <div class="column-title white-text">Sunny</div>
                    <div class="column-info grey-text">Bobby Hebb</div>
                  </div>
                </div>
                <div class="col-md">
                  <div class="row-column">
                    <img src="../images/songs/Song8.jpg" class="playlist-pic"/>
                    <div class="column-title white-text">I.F.L.Y</div>
                    <div class="column-info grey-text">Bazzi</div>
                  </div>
                </div>
                <div class="col-md">
                  <div class="row-column">
                    <img src="../images/songs/Song9.jpg" class="playlist-pic"/>
                    <div class="column-title white-text">Take Care</div>
                    <div class="column-info grey-text">Beach House</div>
                  </div>
                </div>
                <div class="col-md">
                  <div class="row-column">
                    <img src="../images/songs/Song10.jpg" class="playlist-pic"/>
                    <div class="column-title white-text">when the party's over</div>
                    <div class="column-info grey-text">Billie Eilish</div>
                  </div>
                </div>
              </div>
            </div> <!-- Close Row 3 -->

            <!--Row 4 -->
            <div class="content-row picture-row">
              <div class="row">
                <div class="col-md">
                  <div class="row-column">
                    <img src="../images/songs/Song11.png" class="playlist-pic"/>
                    <div class="column-title white-text">RedBone</div>
                    <div class="column-info grey-text">Childish Gambino</div>
                  </div>
                </div>
                <div class="col-md">
                  <div class="row-column">
                    <img src="../images/songs/Song12.jpg" class="playlist-pic"/>
                    <div class="column-title white-text">Blessed</div>
                    <div class="column-info grey-text">Daniel Caesar</div>
                  </div>
                </div>
                <div class="col-md">
                  <div class="row-column">
                    <img src="../images/songs/Song13.jpg" class="playlist-pic"/>
                    <div class="column-title white-text">Electric Love</div>
                    <div class="column-info grey-text">BØRNS</div>
                  </div>
                </div>
                <div class="col-md">
                  <div class="row-column">
                    <img src="../images/songs/Song14.jpg" class="playlist-pic"/>
                    <div class="column-title white-text">Passionfruit</div>
                    <div class="column-info grey-text">Drake</div>
                  </div>
                </div>
                <div class="col-md">
                  <div class="row-column">
                    <img src="../images/songs/Song15.jpg" class="playlist-pic"/>
                    <div class="column-title white-text">Hotel California - 2013 Remaster</div>
                    <div class="column-info grey-text">Eagles</div>
                  </div>
                </div>
              </div>
            </div> <!-- Close Row 4 -->

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
