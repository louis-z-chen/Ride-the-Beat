<html>
<head>

	<title>Ride the Beat</title>
  <link rel="stylesheet" href="https://use.typekit.net/vps8gbz.css">
  <?php require "../reusable_code/header_files.php"; ?>

<style>

body {
  background: linear-gradient(-45deg, #1DB954, #121212, #121212);
  background-size: 400% 400%;
  animation: gradient 6s ease infinite;
}

@keyframes gradient {
   0% {
     background-position: 10% 50%;
   }
   50% {
     background-position: 65% 50%;
   }
   100% {
     background-position: 0% 50%;
   }
}

#maintext {
  font-family: rubik, sans-serif;
  font-weight: 400;
  font-size: 20px;
  font-style: normal;
  width: 600px;
  margin-left: auto;
  margin-right: auto;
  margin-top: 5px;
  text-align: center;
  color: #B1E8C7;
  line-height: 30px;
}

#logo {
  width: 200px;
  margin-left: 50px;
  margin-top: 30px;
  float: left;
}

.logo {
  width: 180px;
  position: relative;
}

#welcome-button:hover{
  color: black;
  background-color: #1DB954;
}

.center-vertical {
  height: 70%;

  position: absolute;
  top:0;
  bottom: 0;
  left: 0;
  right: 0;

  margin: auto;
}

#name-container {
  height: 70%;
  margin-left: auto;
  margin-right: auto;
}

.name-img {
  height: 100%;
  position: relative;
  display: block;
  margin-left: auto;
  margin-right: auto;
}
</style>

</head>
<body>
  <div id="logo">
     <img src="../images/logo3.png" class="logo">
  </div> <!--div for logo-->\

  <div class="center-vertical">
    <div id="name-container">
       <img src="../images/ridethebeattext.png" class="name-img">
    <!--<img src="images/picture.jpg">	The "picture.jpg" file is located in the images folder in the current folder-->
    </div> <!--div for ridethebeattext-->

    <div id="maintext">

      <i class="fas fa-headphones-alt fa-lg"></i>  Discover music from emerging artists
      <br>
      <i class="fas fa-music fa-lg"></i>  Manage, rate, and share your playlists
      <br>
      <i class="fab fa-spotify fa-lg"></i>  Connect your existing Spotify account
      <br>
      <br>
      <button type="button" class="btn btn-outline-success btn-lg" id="welcome-button" href="login_signup.php"><i class="fas fa-swimmer"></i> Dive in</button>

    </div> <!--div for maintext-->

  </div>

<?php require "../reusable_code/footer_files.php"; ?>

</body>
</html>
