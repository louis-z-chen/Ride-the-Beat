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

#errormessage {
  font-family: rubik, sans-serif !important;
  font-weight: 400 !important;
  font-size: 20px !important;
  font-style: normal !important;
  width: 600px !important;
  margin: auto !important;
  text-align: center !important;
  line-height: 30px !important;
	border-radius: 15px !important;
  padding-bottom: 50px !important;
  padding-top: 50px !important;
  background-color: white !important;
}
.center_on_page {
	display: flex;
	justify-content: center;
	align-items: center;
	height: 100%;
	width: 100%;
}
.black-text{
	color: black !important;
}

</style>

</head>
<body>

  <div class="center_on_page">

    <div id="errormessage">
      <br />
      <br />
			<h1 class="black-text">ERROR.</h1>
			<br>
			<div class="black-text">
				You must connect your spotify account to this website.
			</div>
			<br />
			<br />
			<a href="../pages/spotify.php">
	      <button type="button" class="btn btn-outline-success btn-lg">
					<i class="fas fa-sign-in-alt"></i>    CONNECT TO SPOTIFY HERE
				</button> <!--has not been linked yet-->

			</a>

    </div> <!--div for maintext-->

  </div>

<?php require "../reusable_code/footer_files.php"; ?>

</body>
</html>
