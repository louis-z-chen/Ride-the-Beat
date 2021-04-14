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
              <img src="../images/songs/Song1.jpg" class="profile-pic"/>
              </div>
              <div class="col-9 white-text">
              ALBUM
              <h1>AM</h1>
              By Arctic Monkeys - 12 songs
              <button class="nav-link btn btn-success navbar-btn ml green-btn" id="lightmode" style="margin-top: 7px;">Play</button>
              </div>

            </div>
<hr />
            <!--Row 2 -->
            <div class="content-row picture-row">
              <div class="row">

                <table class="table table-dark table-sm">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">TITLE</th>
                        <th scope="col" class="text-right">LENGTH</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>Do I Wanna Know?</td>
                        <td class="text-right">4:32</td>
                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>R U Mine</td>
                        <td class="text-right">3:22</td>
                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <td>One For The Road</td>
                        <td class="text-right">3:26</td>
                      </tr>
                      <tr>
                        <th scope="row">4</th>
                        <td>Arabella</td>
                        <td class="text-right">3:27</td>
                      </tr>
                      <tr>
                        <th scope="row">5</th>
                        <td>I Want It All</td>
                        <td class="text-right">3:05</td>
                      </tr>
                      <tr>
                        <th scope="row">6</th>
                        <td>No. 1 Party Anthem</td>
                        <td class="text-right">4:03</td>
                      </tr>
                      <tr>
                        <th scope="row">7</th>
                        <td>Mad Sounds</td>
                        <td class="text-right">3:35</td>
                      </tr>
                      <tr>
                        <th scope="row">8</th>
                        <td>Fireside</td>
                        <td class="text-right">3:01</td>
                      </tr>
                      <tr>
                        <th scope="row">9</th>
                        <td>Why'd You Only Call Me When You're High?</td>
                        <td class="text-right">2:41</td>
                      </tr>
                      <tr>
                        <th scope="row">10</th>
                        <td>Snap Out Of It</td>
                        <td class="text-right">3:13</td>
                      </tr>
                      <tr>
                        <th scope="row">11</th>
                        <td>Knee Socks</td>
                        <td class="text-right">4:18</td>
                      </tr>
                      <tr>
                        <th scope="row">12</th>
                        <td>I Wanna Be Yours</td>
                        <td class="text-right">3:04</td>
                      </tr>
                    </tbody>
                  </table>

              </div>
            </div> <!-- Close Row 2 -->




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
