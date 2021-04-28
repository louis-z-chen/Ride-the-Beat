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

@media(max-width:320px) {
.logo {
	width: 50px;
}

.name-img {
	width: 50px;
}

.maintext {
	font-size: 15px;
}
}

a:link {
  color: #1DB954;
  background-color: transparent;
  text-decoration: none;
}

a:visited {
  color: #1DB954;
  background-color: transparent;
  text-decoration: none;
}

a:hover {
  color: #FFFFFF;
  background-color: transparent;
  text-decoration: underline;
}

a:active {
  color: #FFFFFF;
  background-color: transparent;
  text-decoration: underline;
}


</style>

</head>
<body>
  <div id="logo">
     <img src="../images/Logo3.png" class="logo">
  </div> <!--div for logo-->\

  <div class="welcome-center-vertical">
    <div id="name-container">
       <img src="../images/ridethebeattext.png" class="name-img">
    <!--<img src="images/picture.jpg">	The "picture.jpg" file is located in the images folder in the current folder-->
    </div> <!--div for ridethebeattext-->

    <div id="maintext" class="maintext">

      <i class="fas fa-headphones-alt fa-lg"></i> Discover music from emerging artists
      <br>
      <i class="fas fa-music fa-lg"></i> Manage, rate, and share your playlists
      <br>
      <i class="fab fa-spotify fa-lg"></i> Connect your existing Spotify account
      <br>
			<br>
			<i class="fas fa-book"></i> <a class="link" href="https://www.urbandictionary.com/define.php?term=Ride%20the%20beat">Unsure of what "Ride The Beat" means?</a>

			<br />
      <br>
			<a href="login_signup.php">
	      <button type="button" class="btn btn-outline-success btn-lg" id="welcome-button">
					<i class="fas fa-swimmer"></i> Dive in
				</button>
			</a>

    </div> <!--div for maintext-->

  </div>

<?php require "../reusable_code/footer_files.php"; ?>

</body>
</html>
