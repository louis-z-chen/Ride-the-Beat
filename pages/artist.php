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
              <img src="../images/jakehope.png" class="profile-pic"/>
              </div>
              <div class="col-9 white-text"><br /><br />
              ARTIST
              <h1>Jake Hope</h1>
               97,690 monthly listeners
                 <button class="nav-link btn btn-success navbar-btn ml green-btn" id="lightmode" style="margin-top: 7px;">Play</button>
              </div>
            </div>
<hr />

            <!--Row 2 -->
            <div class="content-row picture-row">
              <div class="row">
<h4 class="row-title white-text">POPULAR SONGS</h4>
                <table class="table table-dark table-sm">
                    <thead>
                      <tr>
                        <th scope="col">RANK</th>
                        <th scope="col">SONG</th>
                        <th scope="col" class="text-right">PLAYS</th>
                        <th scope="col" class="text-right">LENGTH</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>Heartbroke</td>
                        <td class="text-right">3,410,828</td>
                        <td class="text-right">2:43</td>
                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>By Your Side</td>
                        <td class="text-right">3,162,826</td>
                        <td class="text-right">3:10</td>
                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <td>Virgin Mary</td>
                        <td class="text-right">2,219,797</td>
                        <td class="text-right">3:23</td>
                      </tr>
                      <tr>
                        <th scope="row">4</th>
                        <td>In My Head</td>
                        <td class="text-right">1,489,299</td>
                        <td class="text-right">3:26</td>
                      </tr>
                      <tr>
                        <th scope="row">5</th>
                        <td>What's the Deal</td>
                        <td class="text-right">1,736,917</td>
                        <td class="text-right">3:10</td>
                      </tr>
                    </tbody>
                  </table>

              </div>
            </div> <!-- Close Row 2 -->


            <!--Row 3 -->
            <div class="content-row picture-row">
              <h4 class="row-title white-text">POPULAR ALBUMS</h4>
              <div class="row">
                <div class="col-md">
                  <div class="row-column">
                    <img src="../images/artistalbum1.png" class="playlist-pic"/>
                    <div class="column-title white-text">What's The Deal</div>
                    <div class="column-info grey-text">2018</div>
                    <div class="column-info grey-text">1 song</div>
                  </div>
                </div>
                <div class="col-md">
                  <div class="row-column">
                    <img src="../images/artistalbum2.png" class="playlist-pic"/>
                    <div class="column-title white-text">Why</div>
                    <div class="column-info grey-text">2020</div>
                    <div class="column-info grey-text">1 song</div>
                  </div>
                </div>
                <div class="col-md">
                  <div class="row-column">
                    <img src="../images/artistalbum3.png" class="playlist-pic"/>
                    <div class="column-title white-text">Icare2much</div>
                    <div class="column-info grey-text">2020</div>
                    <div class="column-info grey-text">5 songs</div>
                  </div>
                </div>
                <div class="col-md">
                  <div class="row-column">
                    <img src="../images/artistalbum4.png" class="playlist-pic"/>
                    <div class="column-title white-text">Lost Boy</div>
                    <div class="column-info grey-text">2018</div>
                    <div class="column-info grey-text">8 songs</div>
                  </div>
                </div>
              </div>
            </div> <!-- end Row 3-->

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
