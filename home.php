<?php
	session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Ride the Beat</title>

	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href= "styles.css" rel="stylesheet">


<style>
	body {
        background-color: #121212;
    }

	.container-1 {
		display: flex;
		padding: 20px;
		flex-basis: : 80%;
		justify-content: space-between;
  	align-items: center;
		margin: auto;

	}
	.container-1 div{
		background-color: #535353;
		border-radius: 15px;
	}


	.box-1{
		margin: 20px;
		flex-basis: 80%;
		flex-wrap: wrap;
		flex: 0 0 65%

	}
	.box-2{
		margin-right: 60px;
		margin-left: 20px;
		flex-basis: 50%;
		flex: 0 0 10%
		flex-wrap: wrap;


	}
	.box-3{
		flex: 2;
		margin: 20px;
		flex-basis: auto;
		background-image: url(images/Khalid_-_Product_Page_Banner.jpg);
		background-size: cover;
		height: 250px;

	}
	.box-4{
		flex: 2;
		margin: 20px;
		flex-basis: auto;
		background-image: url(images/jake_hope.jpeg);
		background-repeat: no-repeat;
		height: 250px;

	}
	.box-5{
		display: flex;
		margin: 20px;
		flex-basis: auto;
		color: #FFFFFF;
		font-size: 16px;
		font-family: rubik;
		border: 1px solid red;
		flex-direction: row;

	}
	.box-6{
		display: flex;
		margin: 20px;
		flex-basis: auto;
		color: #FFFFFF;
		font-size: 16px;
		font-family: rubik;
		border: 1px solid yellow;
	}
	.album-1{
		display: flex;
		border: 1px solid green;
	}

	.line-break {
		flex-basis: 100%;
  	height: 0;
	}
	.title{
		margin: 20px;
		color: #FFFFFF;
	}
	.allalbums{
		width: 100px;
		height: 100px;
		margin:auto;
	}



</style>
</head>
<body>
	<?php require "menu.php"; ?>

<div class="container-1">
  <div class="box-1">
		<h3>Box one</h3>
		  <div class="box-3"><h3>Box three</h3></div>
			<div class="title">Underrated Artists</div>
			<div class="box-5">
				<div class="album-1">
					<img src="Jake2.jpg" class="allalbums"/>
					<br><br>Jake Hope
				</div>
				<div class="album-1">
					<img src="KyleLux.jpg" class="allalbums">
				</div>
				<div class="album-1">
					<img src="AlwaysNever.jpg" class="allalbums">

				</div>
				<div class="album-1">
					<img src="Allday.jpg" class="allalbums">
				</div>
				<div class="album-1">
					<img src="Luke.jpg" class="allalbums">
				</div>
				<div class="album-1">
					<img src="Darci.jpg" class="allalbums">
				</div>
			</div><!-- close box-5 -->
			<div class="title">Highest Rated Playlists</div>


			<div class="box-6"></div>
	</div> <!-- close box-1 -->
	<div class="box-2"><h3>Box two</h3>
			<div class="box-4"><h3>Box four</h3></div>
		WHY <br /> Jake Hope
	</div>
</div> <!-- close container-1 -->






	<!-- Required meta tags -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</body>
</html>
