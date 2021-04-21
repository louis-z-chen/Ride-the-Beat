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
  color: black !important;
  line-height: 30px !important;
	border-radius: 15px !important;
  padding-bottom: 50px !important;
  padding-top: 50px !important;
  background-color: white !important;
}

</style>

</head>
<body>
  <div id="logo">
     <img src="../images/Logo3.png" class="logo">
  </div> <!--div for logo-->\

  <div class="welcome-center-vertical">

    <div id="errormessage">
      <br />
      <br />
<h1>ERROR.</h1> <br /> You must connect your spotify account to this website.
<br />
<br />
<br />
			<a href=" ">
	      <button type="button" class="btn btn-outline-success btn-lg" id="welcome-button">
					<i class="fas fa-sign-in-alt"></i>    LOGIN HERE WITH SPOTIFY
				</button> <!--has not been linked yet-->

			</a>

    </div> <!--div for maintext-->

  </div>

<?php require "../reusable_code/footer_files.php"; ?>

</body>
</html>
