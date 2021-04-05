<?php
	session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Ride the Beat</title>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap" rel="stylesheet">

	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/aef7737b1c.js" crossorigin="anonymous"></script>
	<link href= "styles.css" rel="stylesheet">


<style>
	body {
        background-color: #121212;
				font-family: 'Rubik', sans-serif;
    }

	.main-container {
		display: flex;
		padding: 20px;
		flex-basis: : 80%;
		justify-content: center;
  	align-items: center;
		margin: auto;
		margin-left: 50px;

	}
	.main-container div{
		background-color: #535353;
		border-radius: 15px;
	}


	.left-box {
		margin: 20px;
		flex-basis: 80%;
		flex-wrap: wrap;
		flex: 0 0 65%;
		height: 760px;

	}
	.right-box {
		margin-right: 80px;
		margin-left: 20px;
		flex-basis: 50%;
		flex: 0 0 10%
		flex-wrap: wrap;
		height: 760px;

	}
	.left-banner {
		flex: 2;
		margin: 20px;
		flex-basis: auto;
		background-image: url(images/Khalid_-_Product_Page_Banner.jpg);
		background-size: cover;
		height: 250px;
		padding: 40px;
		color: white;

	}
	.box-4{
		flex: 2;
		flex-basis: auto;
		color: #FFFFFF
	}

	.mainalbum{
		display: block;
		height: 230px;
		margin: auto;
		margin-top: 30px;
		border-radius: 15px;

	}
	.underrated-artists {
		display: flex;
		margin: 20px;
		flex-basis: auto;
		color: #FFFFFF;
		font-size: 16px;
		font-family: rubik;
	/*	border: 1px solid red; */
		flex-direction: row;
		justify-content: space-evenly;

	}

	.artist-information{
		display: flex;
		margin: 20px;
		flex-basis: auto;
		color: #FFFFFF;
		font-size: 12px;
		font-family: rubik;
	/*	border: 1px solid red; */
		flex-direction: row;
		justify-content: space-evenly;

	}

	.playlists {
		display: flex;
		margin: 20px;
		flex-basis: auto;
		color: #FFFFFF;
		font-size: 16px;
		font-family: rubik;
	/*	border: 1px solid yellow; */
		justify-content: space-evenly;

	}
	.album-1{
		display: flex;
/*		border: 1px solid green; */
		text-align: justify;
		font-size: 12px;
		color: #FFFFFF;
		justify-content: space-between;
		width: 100px;
	}

	.line-break {
		flex-basis: 100%;
  	height: 0;
	}
	.title{
		margin: 20px;
		color: #FFFFFF;
		font-size: 16px;
	}
	.allalbums{
		width: 100px;
		height: 100px;
		margin:auto;
		border-radius: 3px;
	}

	.spotlight{
		display: block;
		height: 200px;
		margin-left: 48px;
		margin-right: 48px;
		margin-top: 10px;

	}
	.songName{
		font-size: 20px;
		color: #FFFFFF;
		text-align: center;
	}
	.artistName{
		color: #B3B3B3;
		font-size: 16px;
		text-align: center;
	}

	.musicbar {
		display: block;
		width: 300px;
		margin: auto;
		margin-top: 10px;
		margin-bottom: 20px;

	}

	.lyrics {
		display: block;
		height: 200px;
		margin: auto;
		margin-top: 20px;
		font-size: 14px;
		flex: 2;
		flex-basis: auto;
		color: #b3b3b3;
		overflow-y: auto;
		line-height: 20px;
		padding-left: 10px;
		padding-bottom: 10px;

	}

.lyrics::-webkit-scrollbar {
    -webkit-appearance: none;
}

.lyrics::-webkit-scrollbar:vertical {
    width: 11px;
}

.lyrics::-webkit-scrollbar:horizontal {
    height: 11px;
}

.lyrics::-webkit-scrollbar-thumb {
    border-radius: 8px;
    border: 2px solid white; /* should match background, can't be transparent */
    background-color: white;
}


</style>
</head>
<body>
	<?php require "menu.php"; ?>

<div class="main-container">
  <div class="left-box">
		  <div class="left-banner">
				<h6>//TRENDING</h6>
				<h4>Free Spirit</h4>
				<h6>- Khalid</h6>
			</div>
			<div class="title">Underrated Artists</div>
			<div class="underrated-artists">
				<div class="album-1">
					<img src="images/Jake2.jpg" class="allalbums"/>
					<br clear="all" />

				</div>
				<div class="album-1">
					<img src="images/KyleLux.jpg" class="allalbums">
				</div>
				<div class="album-1">
					<img src="images/AlwaysNever.jpg" class="allalbums">

				</div>
				<div class="album-1">
					<img src="images/Allday.jpg" class="allalbums">
				</div>
				<div class="album-1">
					<img src="images/Luke.jpg" class="allalbums">
				</div>
				<div class="album-1">
					<img src="images/Darci.jpg" class="allalbums">
				</div>

			</div><!-- close underrated artists-->

			<div class="artist-information">
				<p>
					Jake Hope <br /> <span style="font-size: 10px">97,406 monthly listeners </span>
				</p>

				<p>
					Kyle Lux <br /> <span style="font-size: 10px">223,964 monthly listeners </span>
				</p>

				<p>
					Always Never <br /> <span style="font-size: 10px">560,446 monthly listeners </span>
				</p>

				<p>
					All Day <br /> <span style="font-size: 10px"> 462,595 monthly listeners </span>
				</p>

				<p>
					Luke Chiang <br /> <span style="font-size: 10px"> 453,110 monthly listeners </span>
				</p>

				<p>
					Darci <br /> <span style="font-size: 10px"> 415,886 monthly listeners </span>
				</p>

			</div> <!--end of artist-information-->


			<div class="title">Highest Rated Playlists</div>

			<div class="playlists">
				<div class="album-1">
					<img src="images/internet.jpg" class="allalbums"/>
					<br clear="all" />

				</div>
				<div class="album-1">
					<img src="images/mood.jpg" class="allalbums">
				</div>
				<div class="album-1">
					<img src="images/lofi.jpg" class="allalbums">

				</div>
				<div class="album-1">
					<img src="images/mellow.jpg" class="allalbums">
				</div>
				<div class="album-1">
					<img src="images/spring.jpg" class="allalbums">
				</div>
				<div class="album-1">
					<img src="images/chill.jpg" class="allalbums">
				</div>

			</div>

			<div class="artist-information">
				<p>
					Unplugged <br /> <span style="font-size: 10px">Louis Chen </span>
				</p>

				<p>
					Mood Booster <br /> <span style="font-size: 10px">Menna Elamroussy </span>
				</p>

				<p>
					Lo-Fi Beats <br /> <span style="font-size: 10px">Sam Budiartho </span>
				</p>

				<p>
					Mellow Beats <br /> <span style="font-size: 10px"> Yuji Itadori </span>
				</p>

				<p>
					Acoustic Spring <br /> <span style="font-size: 10px"> John Smith </span>
				</p>

				<p>
					Chill Vibes <br /> <span style="font-size: 10px"> Elon Musk </span>
				</p>

			</div> <!--end of artist information for second row-->


	</div> <!-- close left box -->
	<div class="right-box">
			<div class="box-4">
				<img src="images/jake_hope.jpeg" class="mainalbum">
			</div>
			<div class="spotlight">
				<div class=songName>Why</div>
				<div class=artistName>Jake Hope</div>
				<div class="box-4">
					<img src="images/musicplay.png" class="musicbar"/>
				</div>
				<div class="box-4">
					<h5 style="padding-left: 10px;">Lyrics</h5>
				<div class="lyrics">
					<p>
Spoke my mind but you stayed silent <br />
No reply auto pilot <br />
How could you cross me girl you aint even christian <br />
This shit was toxic why do I miss it? <br />
Tell me why  <br />
This life in 3d and you show just one side  <br />
Numb to my affection girl you paralyzed  <br />
Keep it all inside  <br />
Things change feelings fade and I've been on my own since then  <br />
Without you it feels  <br />
So strange so vacant but it aint worth the pain again  <br />
Already broke my heart like one time  <br />
Two times  <br />
Im loosing count  <br />
Oh my  <br />
You love putting walls up  <br />
Tear 'em all down  <br />
Nike A1s  <br />
Wear 'em all down  <br />
Flashback to the summer takin trips in my Toyota  <br />
Just bout drove off of the rockies we both though this life was over  <br />
You broke me into pieces  <br />
Still cant patch 'em up  <br />
You'd send me hearts and peaches  <br />
These days i pass 'em up  <br />
I cant  <br />
I cant seem to give you up  <br />
Im way past giving up  <br />
So shawty tell me why  <br />
This life in 3d and you show just one side  <br />
Numb to my affection girl you paralyzed  <br />
Tell me was it all a lie  <br />
All a lie  <br />
All a lie  <br />
Ooooo  <br />
Things change feelings fade and ive been on my own since then  <br />
Without you it feels  <br />
So strange so vacant but it aint worth the pain again  <br />
Already broke my heart like one time  <br />
Two times  <br />
Im loosing count  <br />
Oh my <br />

					</p>
				</div>

				</div>

			</div>


	</div> <!--close right box-->
</div> <!-- close main container -->






	<!-- Required meta tags -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</body>
</html>
